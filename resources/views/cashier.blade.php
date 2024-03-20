<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mutiara Laundry - {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
</head>
<body>
    
    <div class="container-fluid" id="app">
        <div class="row mt-3">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h5 class="mb-0 text-white d-flex align-items-center"><i class="bx bx-package me-2"></i>Daftar Paket</h5>
                    </div>
                    <div class="card-body pt-4">
                        <form class="mb-4">
                            <div class="d-flex">
                                <input type="text" class="form-control me-2" placeholder="Cari paket">
                                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i></button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-3 mb-3" v-for="package in packages" :key="package.id">
                                <div class="card text-center border border-primary">
                                    <div class="card-body pt-4">
                                        <i class='bx bxs-t-shirt bx-sm text-white bg-primary p-3 rounded-circle mb-3'></i>
                                        <h6 class="text-primary fw-bold mb-1">[[ package.name ]]</h6>
                                        <p>Rp [[ formatPrice(package.price) ]] /kg</p>
                                        <button @click="addToCart(package)" class="btn btn-primary d-flex align-items-center w-100 justify-content-center"><i class='bx bx-plus-circle me-2 ms-n1'></i>Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4 position-sticky top-0">
                    <div class="card-header bg-primary">
                        <h5 class="mb-0 text-white d-flex align-items-center"><i class="bx bx-cart-alt me-2"></i>Keranjang</h5>
                    </div>
                    <div class="card-body pt-4">
                        <form action="">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label class="form-label col-form-label">No. Invoice</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" disabled v-model="form.invoice">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label class="form-label col-form-label">Member</label>
                                </div>
                                <div class="col-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nama member" disabled v-model="form.member">
                                        <button class="btn btn-outline-primary" type="button"><i class="bx bx-search"></i></button>
                                        <button class="btn btn-primary" type="button"><i class="bx bx-plus"></i></button>
                                        <button class="btn btn-danger" type="button"><i class="bx bx-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="divider">
                                <div class="divider-text">List Keranjang</div>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table w-100 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Paket</th>
                                            <th class="text-center">QTY</th>
                                            <th>Harga</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(package, i) in form.packages" :key="package.id">
                                            <td>[[ package.name ]]</td>
                                            <td>
                                                <div class="input-group">
                                                    <button class="btn btn-primary btn-sm" type="button"><i class="bx bx-minus"></i></button> 
                                                    <input type="number" class="form-control" style="max-width: 70px" v-model="package.qty">
                                                    <button class="btn btn-primary btn-sm" type="button"><i class="bx bx-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>Rp [[ formatPrice(package.price) ]]</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger" @click="removeFromCart(i)"><i class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr v-if="form.packages.length == 0">
                                            <td colspan="4" class="text-center">Belum ada paket dipilih</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label class="form-label col-form-label">Total Bayar</label>
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" placeholder="1.000" disabled :value="formatPrice(totalPay)">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center">Checkout <i class="bx bx-cart-alt ms-2 me-n1"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/pages/cashier.js"></script>
    

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>