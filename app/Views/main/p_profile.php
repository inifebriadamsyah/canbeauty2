    <div class="site-section cta-big-image" id="profile-section">
        <div class="container">
            <?php foreach ($profile as $p) : ?>
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5 mr-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="shape1">
                            <img class="icon" style="opacity: 0.75;" src="img/dark_logo.png">
                        </div>
                        <div class="shape2">
                            <img class="icon2" style="opacity: 0.75;" src="img/spa.png">
                        </div>
                        <div class="shape3">
                            <img class="icon3" style="opacity: 0.75;" src="img/cosmetics.png">
                        </div>
                        <img src="img/<?= $p['image']; ?>" style="border-radius: 5%;" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-5 mx-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-4 mt-15">
                            <h3 class="h3 section-title mb-4" style="margin-top: 20px;"><?= $p['sub_title']; ?></h3>
                            <p style="font-size: 90%;"><?= $p['2nd_desc']; ?></p>
                            <p style="font-size: 90%;"><?= $p['3nd_desc']; ?></p>
                        </div>
                        <!--
                        <div class="mb-4">
                            <ul class="list-unstyled" style="font-family: Montserrat; font-size: 14px">
                                <li></li>
                            </ul>
                        </div>
                        -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>