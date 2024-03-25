Vue.createApp({
    data() {
        return {
            search: '',
            searchMember: '',
            form: {
                invoice: null,
                member: {
                    id: '',
                    name: '',
                },
                payment: 'unpaid',
                packages: []
            },
            formMember: {
                name: null,
                telp: null,
                address: null
            },
            packages: [],
            modalSearch: null,
            modalAdd: null,
            members: []
        }
    },
    mounted(){
        this.getPackages()
        this.getMembers()
        this.generateInvoiceNumber()

        this.modalSearch = new bootstrap.Modal(document.getElementById('modalSearchMember'), {})
        this.modalAdd = new bootstrap.Modal(document.getElementById('modalAddMember'), {})
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
        increaseQty(index) {
            this.form.packages[index].qty++;
        },
        decreaseQty(index) {
            if (this.form.packages[index].qty > 1) {
                this.form.packages[index].qty--;
            }
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

            await axios.get(`/cashier/get-packages?search=${this.search}`)
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
        async getMembers(){
            $('#modalBodySearch').block({
                message: '<div class="spinner-border text-white" role="status"></div>',
                css: {
                  backgroundColor: 'transparent',
                  border: '0'
                },
                overlayCSS: {
                  opacity: 0.5
                }
            })

            await axios.get(`/cashier/get-members?search=${this.searchMember}`)
                .then((result) => {
                    $('#modalBodySearch').unblock()
                    this.members = result.data
                })
                .catch(() => {
                    $('#modalBodySearch').unblock()
                    
                    Swal.fire({
                        icon: "warning",
                        text: "Gagal mengambil data!",
                        timer: 2000,
                        showConfirmButton: false,
                    })
                })
        },
        async onSubmit(){
            if (this.form.member.id != '' && this.form.packages.length > 0) {
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
    
                await axios.post('/cashier/checkout', this.form)
                .then(response => {
                    $.unblockUI();
                    Swal.fire({
                        icon: "success",
                        html: response.data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        location.reload()
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
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "Member dan paket harus diisi!",
                    timer: 2000,
                    showConfirmButton: false,
                })
            }
        },
        addMemberToCart(memberItem){
            this.form.member.id = memberItem.id
            this.form.member.name = memberItem.name
            this.modalSearch.hide()
        },
        removeMemberFromCart(){
            this.form.member.id = ''
            this.form.member.name = ''
        },
        async onSubmitAdd(){
            $('#modalBodyAdd').block({
                message: '<div class="spinner-border text-white" role="status"></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    opacity: 0.5
                }
            })

            await axios.post('/cashier/add-member', this.formMember)
            .then(response => {
                $('#modalBodyAdd').unblock()
                this.modalAdd.hide()
                Swal.fire({
                    icon: "success",
                    text: "Member berhasil ditambahkan",
                    timer: 2000,
                    showConfirmButton: false,
                })
                this.form.member.id = response.data.data.id
                this.form.member.name = response.data.data.name
                this.removeFormAddMember()
                this.getMembers()
            })
            .catch(error => {
                $('#modalBodyAdd').unblock()
                this.modalAdd.hide()
                Swal.fire({
                    icon: "error",
                    text: error.response.data.error,
                    timer: 2000,
                    showConfirmButton: false,
                })
            })
        },
        removeFormAddMember() {
            this.formMember.name = ''
            this.formMember.telp = ''
            this.formMember.address = ''
        },
        formatPrice(price) {
            var priceString = String(price);
            var parts = priceString.split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        },
        generateInvoiceNumber() {
            const randomDigits = Math.floor(Math.random() * 10000).toString().padStart(4, '0')
            const date = new Date()
            const month = (date.getMonth() + 1).toString().padStart(2, '0')
            const formattedDate = `${date.getDate()}${month}${date.getFullYear()}`
            const invoiceNumber = randomDigits + formattedDate
            this.form.invoice = invoiceNumber
        }
    },
    computed: {
        totalPay(){
            return this.form.packages.reduce((total, item) => total + (item.price * item.qty), 0);
        }
    }
}).mount('#app')