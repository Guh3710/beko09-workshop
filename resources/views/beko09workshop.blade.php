<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Beko 09 Workshop' }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('beko/assets/img/favbeko.png') }}" rel="icon">
    <link href="{{ asset('beko/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('beko/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('beko/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('beko/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('beko/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('beko/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Russo+One&family=Rajdhani:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('beko/assets/css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="{{ asset('beko/assets/img/logobeko09workshop.png') }}" alt="Logo Beko 09 Workshop">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda<br></a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Bubut</a></li>
                    <li><a href="#portfolio">Sparepart</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}"><b>Login</b></a>

        </div>
    </header>

    <main class="main">

        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('beko/assets/img/bg.jpg') }}" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-xl-6 col-lg-8">
                        <h1 class="text-white fw-bold">Halo Selamat Datang Di👋</h1>
                        <h2 class="text-white fw-bold">"Beko 09 Workshop<span class="text-danger">.</span>™"</h2>
                        <p class="text-white fw-bold">Power. Precision. Performance.</p>
                        <p class="text-white fw-bold">-- Of --</p>
                        <p class="text-white fw-bold">Your Motor Racing</p>
                    </div>
                </div>

                {{-- Ikon Tools --}}
                <div class="row gy-4 mt-5 mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="fas fa-circle-notch"></i>
                            <h3><a href="#">Bubut Mesin</a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="icon-box">
                            <i class="fas fa-screwdriver"></i>
                            <h3><a href="#">Rubah Sudut Mesin</a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="fas fa-screwdriver-wrench"></i>
                            <h3><a href="#">Tune Up Mesin</a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="fas fa-motorcycle"></i>
                            <h3><a href="#">Sparepart Balap</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="{{ asset('beko/assets/img/walbg.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content">
                        <h3>Tentang Kami</h3>
                        <p class="fst-italic">
                            <b>Sekilas Tentang Kami
                        </p>
                        <p></p>
                        <p>
                            Beko 09 Workshop adalah bengkel dan toko sparepart motor balap yang berlokasi di Dusun
                            Gunung Rajak, Kecamatan Sakra Barat, Kabupaten Lombok Timur. Kami hadir untuk memenuhi
                            kebutuhan para pecinta otomotif, khususnya motor balap, dengan menyediakan layanan
                            perbengkelan profesional dan berbagai komponen berkualitas tinggi.
                        <p></p>
                        Didirikan dengan semangat dan pengalaman di dunia teknik dan balap motor, Beko 09 Workshop tidak
                        hanya menjual sparepart motor racing, tetapi juga menyediakan layanan jasa bubut presisi tinggi
                        untuk berbagai keperluan mesin dan custom part.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>🔧 Jasa Bubut & Fabrikasi Seperti Pengerjaan
                                    presisi
                                    untuk komponen mesin, seperti crankshaft, noken as, piston, dan lainnya.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>🛒 Penjualan Sparepart Motor Balap
                                    Produk-produk original dan aftermarket untuk mendukung performa maksimal motor
                                    Anda.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>🚀 Pelayanan Cepat & Tepat, tanpa mengorbankan
                                    kualitas.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>👨‍🔧 Teknisi Berpengalaman, konsultasi performa
                                    motor bagi para pembalap, kami siap memberikan arahan dan
                                    rekomendasi teknis dan paham kebutuhan motor Anda.</b></span></li>
                        </ul>
                        <div class="text-center mt-4">
                            <img src="{{ asset('beko/assets/img/logobeko09workshop.png') }}"
                                alt="Logo Beko 09 Workshop" class="img-fluid mt-5"
                                style="max-height: 200px; object-fit: contain;">
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-1.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-2.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-3.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-4.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-5.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-6.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-7.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('beko/assets/img/clients/client-8.png') }}"
                                class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2><b>Bubut</b></h2>
                <p>Bubut Mesin<i class="fas fa-circle-notch text-warning" style="margin-left: 12px;"></i></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-gear-wide-connected text-dark"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Bubut Komponen Racing</h3>
                            </a>
                            <p><strong>Kami melayani jasa bubut untuk berbagai komponen motor balap seperti
                                    pulley,
                                    gear, kruk as, dan lainnya dengan presisi tinggi menggunakan mesin bubut
                                    modern.</strong></p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-speedometer2 text-dark"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Setting dan Balancing</h3>
                            </a>
                            <p><strong>Jasa setting dan balancing untuk komponen mesin agar performa motor balap
                                    lebih
                                    maksimal
                                    dan minim getaran saat RPM tinggi.</strong></p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-tools text-dark"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Custom Parts Motor Racing</h3>
                            </a>
                            <p><strong>Buat part custom sesuai kebutuhan balap Anda, seperti adaptor, bracket,
                                    atau
                                    modifikasi dudukan komponen. Dikerjakan langsung oleh teknisi
                                    berpengalaman.</strong></p>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2><b>Sparepart</b></h2>
                <p>Sparepart Racing<i class="fas fa-motorcycle text-warning" style="margin-left: 12px;"></i>
                </p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active text-dark">Semua Produk Sparepart</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Retener</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}"
                                    title="Retener" data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Bos Klep Drat Karbon</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-2.jpg') }}"
                                    title="Bos Klep Drat Karbon" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Klep</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-3.jpg') }}"
                                    title="Klep" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-4.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Noken As</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-4.jpg') }}"
                                    title="Noken As" data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-5.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Sok Racing</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-5.jpg') }}"
                                    title="Sok Racing" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-6.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Kop Kepala Silinder</h4>
                                <p><b>Lihat</b></p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-6.jpg') }}"
                                    title="Kop Kepala Silinder" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        {{-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-7.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Produk 7</h4>
                                <p>Lihat</p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-7.jpg') }}"
                                    title="App 3" data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-8.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Produk 8</h4>
                                <p>Lihat</p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-8.jpg') }}"
                                    title="Product 3" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-9.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Produk 9</h4>
                                <p>Lihat</p>
                                <a href="{{ asset('beko/assets/img/masonry-portfolio/masonry-portfolio-9.jpg') }}"
                                    title="Branding 2" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a> --}}
                    </div>
                </div><!-- End Portfolio Item -->

            </div><!-- End Portfolio Container -->

            </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2><b>Kontak</b></h2>
                <p>Kontak Kami</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3568.9354229983214!2d116.463258!3d-8.710341999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwNDInMzcuMiJTIDExNsKwMjcnNDcuNyJF!5e1!3m2!1sid!2sid!4v1752933556043!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4 justify-content-center text-center mt-5">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="info-item d-flex flex-column align-items-center" data-aos="fade-up"
                            data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0 mb-2 text-dark"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Gerumus, Desa Gunung Rajak, Kec. Sakra Barat, Kab. Lombok Timur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="info-item d-flex flex-column align-items-center" data-aos="fade-up"
                            data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0 mb-2 text-dark"></i>
                            <div>
                                <h3>Telepon/WA</h3>
                                <p>+62 878-6552-8280</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="info-item d-flex flex-column align-items-center" data-aos="fade-up"
                            data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0 mb-2 text-dark"></i>
                            <div>
                                <h3>Email Kami</h3>
                                <p>beko09Workshop@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="footer-top py-4">
            <div class="container">
                <div class="row text-center align-items-center">
                    <!-- Logo Kiri -->
                    <div class="col-md-3 mb-3 mb-md-0">
                        <img src="{{ asset('beko/assets/img/logoleft.png') }}" alt="Logo Kiri" class="img-fluid"
                            style="max-height: 80px;">
                    </div>

                    <!-- Konten Tengah -->
                    <div class="col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex justify-content-center align-items-center mb-3">
                            <span class="sitename">Beko 09 Workshop<span class="text-danger">.</span>™</span>
                        </a>

                        <div class="social-links d-flex justify-content-center gap-2 mt-4">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Logo Kanan -->
                    <div class="col-md-3 mb-3 mb-md-0">
                        <img src="{{ asset('beko/assets/img/logoright.png') }}" alt="Logo Kanan" class="img-fluid"
                            style="max-height: 80px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center py-3">
            <div class="container">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Beko 09 Workshop<span
                            class="text-danger">.</span>™</strong> <span>All Rights Reserved</span>
                </p>
                <div class="credits">
                    <a href="#">Designed by Guh_3710</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('beko/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('beko/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('beko/assets/js/main.js') }}"></script>
    @livewireScripts

</body>

</html>
