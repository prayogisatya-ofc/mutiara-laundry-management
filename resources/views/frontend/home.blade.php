@extends('frontend.layouts.app')

@section('title', 'Nyuci di Sini Aja')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="company-badge mb-4">
                        <i class="bi bi-pass-fill me-2"></i>
                        Nyuci di Sini Aja
                    </div>

                    <h1 class="mb-4">
                        Laundry Pakaian <br>
                        Harga Terjangkau <br>
                        <span class="accent-text">Siap Diantar</span>
                    </h1>

                    <p class="mb-4 mb-md-5">
                        Di sini kami akan membersihkan pakaian anda dengan pelayanan terbaik.
                        Tidak perlu khawatir dengan harga, pasti terjangkau dan tersedia layanan antar laundry.
                    </p>

                    <div class="hero-buttons">
                        <a href="https://wa.me/6282184565357?text=Halo+min+saya+mau+order+laundry" class="btn btn-primary me-0 me-sm-2 mx-1" target="_blank">Order Sekarang</a>
                        <a href="{{ route('cek_laundry.index') }}"
                            class="btn btn-link mt-2 mt-sm-0">
                            <i class="bi bi-receipt me-1"></i>
                            Cek Laundry
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('frontend/img/hero-mutiaralaundry.svg') }}" alt="Hero Image" class="img-fluid">

                    <div class="customers-badge mb-5">
                        <p class="mb-0">Lebih dari 1000+ pelanggan yang sudah kami cucikan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-stopwatch"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Cepat dan Efisien</h4>
                        <p class="mb-0">Waktu pengerjaan yang cepat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Siap Antar</h4>
                        <p class="mb-0">Gratis antar jemput untuk pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Kualitas Terjamin</h4>
                        <p class="mb-0">Menggunakan deterjen berkualitas tinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Harga Kompetitif</h4>
                        <p class="mb-0">Harga yang terjangkau untuk semua.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

            <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                <span class="about-meta">Tentang Kami</span>
                <h2 class="about-title">Pilihan Terbaik untuk Pakaian Bersih dan Rapi</h2>
                <p class="about-description">Mutiara Laundry hadir sebagai solusi terbaik untuk kebutuhan laundry Anda. 
                    Kami memberikan pelayanan berkualitas tinggi dengan mengutamakan kenyamanan dan kepuasan pelanggan. 
                    Dengan pengalaman bertahun-tahun, kami siap membantu menjaga kebersihan pakaian Anda dengan sentuhan profesional.
                </p>

                <div class="row feature-list-wrapper">
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Pelayanan cepat</li>
                            <li><i class="bi bi-check-circle-fill"></i> Menggunakan teknologi terkini</li>
                            <li><i class="bi bi-check-circle-fill"></i> Deterjen ramah lingkungan</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Harga yang bersahabat</li>
                            <li><i class="bi bi-check-circle-fill"></i> Pekerja profesional</li>
                            <li><i class="bi bi-check-circle-fill"></i> Layanan siap antar</li>
                        </ul>
                    </div>
                </div>

                <div class="info-wrapper">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <div class="profile d-flex align-items-center gap-3">
                                <img src="{{ asset('frontend/img/owner.png') }}" alt="CEO Profile" class="profile-image">
                                <div>
                                    <h4 class="profile-name">Aries Tri Ernando, S.E.</h4>
                                    <p class="profile-position">Pemilik Mutiara Laundry</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                <div class="image-wrapper">
                    <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                        <img src="{{ asset('frontend/img/about-5.png') }}" alt="Business Meeting"
                            class="img-fluid main-image rounded-4">
                        <img src="{{ asset('frontend/img/about-2.jpg') }}" alt="Team Discussion"
                            class="img-fluid small-image rounded-4">
                    </div>
                    <div class="experience-badge floating">
                        <h3>10+ <span>Tahun</span></h3>
                        <p>Pengalaman dalam berbisnis laundry</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->

<!-- Features 2 Section -->
<section id="features" class="features-2 section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Pantau Cucian</h2>
        <p>Selalu pantau progres cucian kamu setiap harinya di sini.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

            <div class="col-lg-4">

                <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                    <div class="d-flex align-items-center justify-content-end gap-4">
                        <div class="feature-content">
                            <h3>Masuk halaman "Cek Laundry"</h3>
                        </div>
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-1-circle"></i>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

                <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
                    <div class="d-flex align-items-center justify-content-end gap-4">
                        <div class="feature-content">
                            <h3>Masukkan Nomor Invoice</h3>
                        </div>
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-2-circle"></i>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

                <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
                    <div class="d-flex align-items-center justify-content-end gap-4">
                        <div class="feature-content">
                            <h3>Klik tombol <i class="bi bi-search ms-2"></i></h3>
                        </div>
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-3-circle"></i>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

            </div>

            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="phone-mockup text-center">
                    <img src="{{ asset('frontend/img/mockup-pantau.png') }}" alt="Phone Mockup" class="img-fluid">
                </div>
            </div><!-- End Phone Mockup -->

            <div class="col-lg-4">

                <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="d-flex align-items-center gap-4">
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-4-circle"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Muncul Informasi Pesanan</h3>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

                <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
                    <div class="d-flex align-items-center gap-4">
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-5-circle"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Muncul Informasi Paket</h3>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

                <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
                    <div class="d-flex align-items-center gap-4">
                        <div class="feature-icon flex-shrink-0">
                            <i class="bi bi-6-circle"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Cek terus untuk ketahui status</h3>
                        </div>
                    </div>
                </div><!-- End .feature-item -->

            </div>
        </div>

    </div>

</section><!-- /Features 2 Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row content justify-content-center align-items-center position-relative">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 mb-4">Pakaian Bersih, Hidup Lebih Mudah!</h2>
                <p class="mb-4">Jangan biarkan cucian menumpuk! Percayakan pakaian Anda kepada kami untuk hasil terbaik.</p>
                <a href="https://wa.me/6282184565357?text=Halo+min+saya+mau+order+laundry" class="btn btn-cta">Order Sekarang</a>
            </div>

            <!-- Abstract Background Elements -->
            <div class="shape shape-1">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <div class="shape shape-2">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <!-- Dot Pattern Groups -->
            <div class="dots dots-1">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                </svg>
            </div>

            <div class="dots dots-2">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                </svg>
            </div>

            <div class="shape shape-3">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>
        </div>

    </div>

</section><!-- /Call To Action Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Apa kata mereka yang sudah mempercayarakan cucian mereka kepada kami?</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-item">
                    <img src="{{ asset('frontend/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img"
                        alt="">
                    <h3>Adella Dannura Putri Setyawan</h3>
                    <h4>Pelanggan</h4>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i>
                    </div>
                    <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Suka banget laundry disini, wangii rapih.. padahal cuci kering tapi kaya udah di setrikaaa.. bakal langganan teruss.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                </div>
            </div><!-- End testimonial item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-item">
                    <img src="{{ asset('frontend/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img"
                        alt="">
                    <h3>Novri Photography</h3>
                    <h4>Pelanggan</h4>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i>
                    </div>
                    <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Udah sering ganti-ganti tempat laundry, tapi ini sih yang paling oke. Baju nggak cuma bersih, tapi juga wangi tahan lama. Recommended banget!</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                </div>
            </div><!-- End testimonial item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-item">
                    <img src="{{ asset('frontend/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img"
                        alt="">
                    <h3>Hidayat AZ</h3>
                    <h4>Pelanggan</h4>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i>
                    </div>
                    <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Awalnya ragu, tapi pas coba, ternyata hasilnya oke banget! Harga bersahabat, pelayanan cepat, pokoknya puas banget sama Mutiara Laundry!</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                </div>
            </div><!-- End testimonial item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="testimonial-item">
                    <img src="{{ asset('frontend/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img"
                        alt="">
                    <h3>Adhitya Gaca</h3>
                    <h4>Pelanggan</h4>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i>
                    </div>
                    <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Laundry di sini tuh juara banget! Pakaian aku selalu bersih, wangi, dan rapi. Plus, nggak pernah telat antar. Udah langganan banget deh!</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                </div>
            </div><!-- End testimonial item -->

        </div>

    </div>

</section><!-- /Testimonials Section -->

<!-- Stats Section -->
<section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="987" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Pelanggan</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="4999" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Pakaian</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="9999"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jam Mencuci</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Pesanan per Hari</p>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>

</section><!-- /Stats Section -->

<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Layanan Kami</h2>
        <p>Apa saja jenis pencucian yang kami tawarkan kepada pelanggan?</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-layers"></i>

                    </div>
                    <div>
                        <h3>Cuci Setrika</h3>
                        <p class="mb-0">Layanan lengkap untuk menjaga pakaian Anda tetap bersih, harum, dan rapi. Pakaian dicuci dengan teknik yang tepat menggunakan deterjen berkualitas, kemudian disetrika dengan rapi agar siap digunakan.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-wind"></i>
                    </div>
                    <div>
                        <h3>Cuci Kering</h3>
                        <p class="mb-0">Pilihan terbaik untuk pakaian yang membutuhkan perawatan khusus. Proses pencucian dilakukan secara hati-hati tanpa menggunakan air, sehingga aman untuk bahan pakaian sensitif.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-eject"></i>
                    </div>
                    <div>
                        <h3>Setrika</h3>
                        <p class="mb-0">Layanan khusus menyetrika pakaian Anda untuk memastikan tampil rapi dan bebas kusut. Cocok untuk Anda yang ingin menghemat waktu tetapi tetap tampil prima.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-map"></i>
                    </div>
                    <div>
                        <h3>Cuci Karpet</h3>
                        <p class="mb-0">Layanan pencucian karpet profesional dengan metode khusus yang mampu menghilangkan noda, kotoran, dan bau tidak sedap, sehingga karpet kembali bersih, segar, dan nyaman digunakan.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

        </div>

    </div>

</section><!-- /Services Section -->

<!-- Pricing Section -->
<section id="pricing" class="pricing section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Harga</h2>
        <p>Harga layanan pencucian yang ada di mutiara laundry</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 justify-content-center">

            <!-- Basic Plan -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <h3>Setrika</h3>
                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">4.000</span>
                        <span class="period">/ kg</span>
                    </div>
                    <p class="description">Layanan khusus menyetrika pakaian Anda untuk memastikan tampil rapi dan bebas kusut.</p>

                    <h4>Yang di dapatkan:</h4>
                    <ul class="features-list">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Baju di setrika
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Menggunakan pengharum
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Standard Plan -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card popular">
                    <div class="popular-badge">Paling Populer</div>
                    <h3>Cuci Setrika</h3>
                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">5.000</span>
                        <span class="period">/ kg</span>
                    </div>
                    <p class="description">Layanan lengkap untuk menjaga pakaian Anda tetap bersih, harum, dan rapi.</p>

                    <h4>Yang di dapatkan:</h4>
                    <ul class="features-list">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Baju di cuci dengan mesin cuci
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Menggunakan deterjer berkualitas
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Baju di setrika
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Menggunakan pengharum
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <h3>Cuci Kering</h3>
                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">4.000</span>
                        <span class="period">/ kg</span>
                    </div>
                    <p class="description">Pilihan terbaik untuk pakaian yang membutuhkan perawatan khusus.</p>

                    <h4>Yang di dapatkan:</h4>
                    <ul class="features-list">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Baju di cuci dengan mesin cuci
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Menggunakan deterjen berkualitas
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</section><!-- /Pricing Section -->

<!-- Faq Section -->
<section class="faq-9 faq section light-background" id="faq">

    <div class="container">
        <div class="row">

            <div class="col-lg-5" data-aos="fade-up">
                <h2 class="faq-title">Punya pertanyaan? Lihat FAQ di bawah ini</h2>
                <p class="faq-description">Berikut ini adalah beberapa pertanyaan yang sering ditanyakan oleh pelanggan kami. Jika Anda tidak menemukan jawaban untuk pertanyaan Anda, silakan hubungi kami melalui kontak di bawah ini.</p>
                <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                    <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                <div class="faq-container">

                    <div class="faq-item faq-active">
                        <h3>Apa saja layanan yang tersedia di Mutiara Laundry?</h3>
                        <div class="faq-content">
                            <p>Kami menyediakan layanan Cuci Setrika, Cuci Kering, Setrika saja, dan Cuci Karpet. Semua layanan dilakukan dengan standar kebersihan dan kualitas terbaik.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah Mutiara Laundry memiliki layanan antar jemput?</h3>
                        <div class="faq-content">
                            <p>Ya, kami menyediakan layanan antar jemput gratis untuk wilayah tertentu. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Berapa lama waktu pengerjaan laundry?</h3>
                        <div class="faq-content">
                            <p>Waktu pengerjaan standar adalah 1-2 hari kerja, tergantung jenis layanan dan jumlah cucian. Untuk layanan express, kami juga siap membantu.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah ada garansi untuk pakaian yang rusak atau hilang?</h3>
                        <div class="faq-content">
                            <p>Kami sangat menjaga kualitas dan keamanan pakaian Anda. Namun, jika terjadi kerusakan atau kehilangan, kami memiliki kebijakan garansi untuk memastikan kepuasan pelanggan.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Bagaimana cara memesan layanan Mutiara Laundry?</h3>
                        <div class="faq-content">
                            <p>Anda dapat memesan layanan kami melalui WhatsApp, telepon, atau langsung datang ke outlet kami.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah ada promo atau diskon yang tersedia?</h3>
                        <div class="faq-content">
                            <p>Kami sering mengadakan promo menarik untuk pelanggan setia. Pantau media sosial kami untuk informasi terbaru.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                </div>
            </div>

        </div>
    </div>
</section><!-- /Faq Section -->

<!-- Call To Action 2 Section -->
<section id="call-to-action-2" class="call-to-action-2 section dark-background">

    <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <h3>Pantau Cucian Anda dengan Mudah!</h3>
                    <p>Tidak perlu khawatir menunggu tanpa kepastian. Dengan fitur <b>Cek Laundry</b>, Anda bisa mengetahui progres cucian Anda secara real-time.</p>
                    <a class="cta-btn" href="{{ route('cek_laundry.index') }}">Cek Laundry</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Call To Action 2 Section -->

<!-- Contact Section -->
<section id="contact" class="contact section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Anda memiliki pertanyaan atau ingin memesan layanan Mutiara Laundry? Silakan hubungi kami melalui kontak di bawah ini.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3>Kontak Info</h3>
                    <p>Untuk informasi lebih lanjut, anda dapat menghubungi kami melalui kontak di bawah ini.</p>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4>Lokasi Kami</h4>
                            <p>Kompleks Ruko Eldorado, Jl. Untung Suropati</p>
                            <p>Labuhan Dalam, Kedaton</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Nomor Telepon</h4>
                            <p>+62 821 8456 5357</p>
                            <p>+62 895 0370 2003</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Alamat Email</h4>
                            <p>info@mutiaralaundry.com</p>
                            <p>mutiaralaundry@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Hubungi Kami</h3>
                    <p>Terima kasih atas kesediaan Anda menghubungi kami. Kami akan dengan senang hati membantu Anda dengan pertanyaan atau pesanan Anda.</p>

                    <form action="{{ route('contact') }}" method="post"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nama Anda" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Email Anda" required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="subject"
                                    placeholder="Judul" required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn">Kirim Pesan</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</section><!-- /Contact Section -->
@endsection