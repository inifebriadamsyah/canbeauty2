<section class="site-section testimonial-wrap bg-img" style="background-image: url(img/hero3.png)" id="testimoni-section" data-aos="fade up">
    <div class="container ">
        <div class="row mb-5 ">
            <div class="col-12 text-center ">
                <h2 class="section-title mb-3 ">Ulasan Pembeli</h2>
            </div>
        </div>
    </div>
    <div class="slide-one-item home-slider owl-carousel ">
        <?php foreach ($ulasan as $u) : ?>
            <div>
                <div class="testimonial ">
                    <blockquote class="mb-5 ">
                        <p>&ldquo;<?= $u['ulasan_teks']; ?>&rdquo;</p>
                    </blockquote>
                    <figure class="mb-4 d-flex align-items-center justify-content-center ">
                        <div><img src="img/<?= $u['image_pembeli']; ?>" alt="Image " class="w-50 img-fluid mb-3 "></div>
                        <p><?= $u['nama_pembeli']; ?></p>
                    </figure>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>