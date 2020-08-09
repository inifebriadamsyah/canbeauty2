<section class="site-section" id="testimoni-section">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">Testimoni</h2>
                <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="row justify-content-center mb-5" data-aos="fade-up">
            <div id="filters" class="filters text-center button-group col-md-9">
                <button class="btn btn-secondary active" data-filter="*">All</button>
                <?php foreach ($testimoni as $i) : ?>
                    <button class="btn btn-secondary" data-filter=".<?= $i['category']; ?>"><?= $i['category']; ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div id="posts" class="row no-gutter">
            <?php foreach ($testimoni as $t) : ?>
                <div class="item <?= $t['category']; ?> col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                    <a href="asset_main/sval/images/<?= $t['image']; ?>" class="item-wrap fancybox" data-fancybox="gallery2">
                        <span class="icon-search2"></span>
                        <img class="img-fluid" src="asset_main/sval/images/<?= $t['image']; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>