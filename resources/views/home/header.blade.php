<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class=" me-auto"><a href="index.html">SPPay</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#kebijakan">Kebijakan</a></li>
                <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                {{-- <li><a class="nav-link scrollto" href="#portfolio">Galeri</a></li> --}}
                <li><a class="nav-link scrollto" href="#team">Kontak</a></li>
                {{-- <li><a class="nav-link scrollto" href="#contact">Kontak</a></li> --}}
                <li><a class="getstarted scrollto" href="/login">Masuk</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>SPPay </h1>
                <h2>Aplikasi pembayaran SPP SMKN 4 Bojonegoro</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="/login" class="btn-get-started scrollto">Masuk</a>
                    <a href="https://youtu.be/Ne9w-4Fs5CM" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('template/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->
