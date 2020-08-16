<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-xl-2">
                <div class="site-logo">
                    <a href=""><img src="<?= base_url(); ?>/asset_main/sval/images/logo.png" alt="logo can beauty" width="175px" height="80px"></a>
                </div>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="" class="nav-link">Beranda</a></li>
                        <li><a href="#profile-section" class="nav-link">Profil Perusahaan</a></li>
                        <li><a href="#produk-section" class="nav-link">Produk</a></li>
                        <li><a href="#paket-section" class="nav-link">Paket penjualan</a></li>
                        <li><a href="#testimoni-section" class="nav-link">Testimoni</a></li>
                        <li><a href="#contact-section" class="nav-link">Kontak</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle float-right">
                    <span class="icon-menu h3"></span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ##### Hero Area Start ##### -->
<div class="hero-area">
    <div class="hero-slideshow owl-carousel">
        <!-- Single Slide -->
        <?php foreach ($hero as $h) : ?>
            <div class="single-slide bg-img">
                <!-- Background Image-->
                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(asset_main/sval/images/<?= $h['background']; ?>);"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-delay="100ms"><span><?= $h['judul']; ?></span></h2>
                                <p data-delay="275ms"><?= $h['deskripsi']; ?></p>
                                <br>
                                <div data-delay="500ms">
                                    <a href="#contact-section" class="btn smoothscroll btn-primary mb-2"><?= $h['button']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#paket-section" class="mouse smoothscroll">
                    <span class="mouse-icon">
                        <span class="mouse-wheel"></span>
                    </span>
                </a>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>
        <?php endforeach; ?>

        <!-- Single Slide -->
        <div class="single-slide bg-img">
            <!-- Background Image-->
            <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(img/slide3.jpeg);"></div>
            <!-- Welcome Text -->
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="welcome-text text-center">
                            <h2 data-delay="100ms">Coming <span>soon!</span></h2>
                            <p data-delay="275ms">We Provide the best beauty products!</p>
                            <br>
                            <div data-delay="500ms">
                                <a href="#contact-section" class="btn smoothscroll btn-primary mb-2">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#paket-section" class="mouse smoothscroll">
                <span class="mouse-icon">
                    <span class="mouse-wheel"></span>
                </span>
            </a>
            <!-- Slide Duration Indicator -->
            <div class="slide-du-indicator"></div>
        </div>
    </div>
</div>
<!-- ##### Hero Area End ##### -->