<section class="site-section" id="produk-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-9 text-center">
                <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Produk Kami</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="shape1" style="left: -40px; opacity: 0.25;"></div>
                <div class="shape3" style="right: 100px; opacity: 0.25; ;"></div>

                <div class="owl-carousel slide-one-item-alt">
                    <?php foreach ($products as $pr) : ?>
                        <img src="asset_main/sval/images/<?= $pr['image']; ?>" style="border-radius: 20px;" alt="Image" class="img-fluid">
                    <?php endforeach; ?>
                </div>
                <div class="custom-direction">
                    <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
                </div>
            </div>
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                <div class="owl-carousel slide-one-item-alt-text">
                    <?php foreach ($products as $p) : ?>
                        <div>
                            <br>
                            <h3 class="section-notitle mb-3"><?= $p['nama_produk']; ?></h3>
                            <p class=" mr-30 mb-15"><?= $p['deskripsi']; ?></p>
                            <br>
                            <p><a href="#" class="btn btn-primary mr-2 mb-2">Lihat Selengkapnya</a></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>