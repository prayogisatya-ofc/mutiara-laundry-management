Vue.createApp({
    data() {
        return {
            form: {
                invoice: null,
                member: null,
                packages: []
            },
            formMember: {
                name: null,
                telp: null,
                address: null
            },
            packages: []
        }
    },
    mounted(){
        this.getPackages()
    },
    delimiters: ['[[', ']]'],
    methods: {
        addToCart(packageItem) {
            const existingItemIndex = this.form.packages.findIndex(item => item.id === packageItem.id);

            if (existingItemIndex !== -1) {
                this.form.packages[existingItemIndex].qty++;
            } else {
                this.form.packages.push({ ...packageItem, qty: 1 });
            }
        },
        removeFromCart(index) {
            this.form.packages.splice(index, 1);
        },
        async getPackages(){
            $.blockUI({
                message: '<div class="spinner-border text-white" role="status"></div>',
                css: {
                  backgroundColor: 'transparent',
                  border: '0'
                },
                overlayCSS: {
                  opacity: 0.5
                }
            })

            await axios.get(`/cashier/get-packages`)
                .then((result) => {
                    $.unblockUI();
                    this.packages = result.data
                })
                .catch(() => {
                    $.unblockUI();
                    
                    Swal.fire({
                        icon: "warning",
                        text: "Gagal mengambil data!",
                        timer: 2000,
                        showConfirmButton: false,
                    })
                })
        },
        async onSubmit(){
            $.blockUI({
                message: '<div class="spinner-border text-white" role="status"></div>',
                css: {
                  backgroundColor: 'transparent',
                  border: '0'
                },
                overlayCSS: {
                  opacity: 0.5
                }
            })

            await axios.post('/auth/login/authenticate', this.form, { 
                headers: { "X-CSRFToken": this.csrf }
            })
            .then(response => {
                $.unblockUI();
                Swal.fire({
                    icon: "success",
                    text: response.data.success,
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    var url_string = window.location.href;
                    var url = new URL(url_string);
                    if (url.searchParams.has("next")) {
                        var nextUrl = url.searchParams.get("next")
                        window.location.href = nextUrl
                    } else {
                        window.location.href = "/"
                    }
                })
            })
            .catch(error => {
                $.unblockUI();
                Swal.fire({
                    icon: "error",
                    text: error.response.data.error,
                    timer: 2000,
                    showConfirmButton: false,
                })
            })
        },
        formatPrice(price) {
            var priceString = String(price);
            var parts = priceString.split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        },
    },
    computed: {
        totalPay(){
            return this.form.packages.reduce((total, item) => total + (item.price * item.qty), 0);
        }
    }
}).mount('#app')