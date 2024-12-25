<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="" class="me-3">
            <h1 class="sitename d-none d-sm-block">{{ config('app.name') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#features">Pantau</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="#pricing">Harga</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" target="_blank" href="https://wa.me/6282184565357?text=Halo+min+saya+mau+order+laundry">Order Sekarang</a>

    </div>
</header>