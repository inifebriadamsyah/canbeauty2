<footer class="site-footer bg-kindagrey">
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 ">
                <?php foreach ($footer as $f) : ?>
                    <div class="row ">
                        <div class="col-md-8 col-lg-8 md-8">
                            <h2 class="footer-heading mb-4 ">Can Beauty</h2>
                            <p><?= $f['footer_text']; ?></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-md-4">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="<?= $f['facebook']; ?>" style="font-size: 40px;" class="pl-0 pr-3"><span class="icon-facebook-square"></span></a>
                            <a href="<?= $f['instagram']; ?>" style="font-size: 40px;" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top pt-5">
                                <p style="font-family: Exo 2;">
                                    <strong>Copyright</strong> &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</footer>
</div>
<!-- Scroll Up -->
<div id="back-top" data-aos="fade-up" data-aos-delay="100">
    <a title="hubungi kami" href="#home-section"><img src="img/whatsapp.png" alt="logo can beauty" width="44px" height="44px">
    </a>
</div>

<!-- .site-wrap -->
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery-3.3.1.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery-ui.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/popper.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/bootstrap.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/owl.carousel.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery.countdown.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery.easing.1.3.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/aos.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery.fancybox.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/jquery.sticky.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/isotope.pkgd.min.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/main.js "></script>
<script src="<?= base_url(); ?>/asset_main/sval/js/active.js "></script>
</body>

</html>