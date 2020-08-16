<div class="section" id="contact-section">
    <div class="container">
        <?php foreach ($kontak as $k) : ?>
            <div class="row">
                <div class="col-md-3 mt-30 mt-md-0">
                    <div class="feature-box fbox-plain fbox-small color mb-0">
                        <div class="fbox-icon"><i class="icon-building-o"></i></i>
                        </div>
                        <br>
                        <h3>Kantor Operasional</h3>
                        <p><a class="mt-30" href="<?= $k['alamat_link']; ?>"><?= $k['alamat']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 mt-30 mt-md-0">
                    <div class="feature-box fbox-plain fbox-small color mb-0">
                        <div class="fbox-icon"><i class="icon-whatsapp"></i> </div>
                        <br>
                        <h3>Whatsapp</h3>
                        <p><a href="<?= $k['whatsapp_link']; ?>"><?= $k['whatsapp']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 mt-30 mt-md-0">
                    <div class="feature-box fbox-plain fbox-small color mb-0">
                        <div class="fbox-icon"> <i class="icon-facebook-square"></i> </div>
                        <br>
                        <h3>Facebook</h3>
                        <p><a href="<?= $k['facebook_link']; ?>"><?= $k['facebook']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 mt-30 mt-md-0">
                    <div class="feature-box fbox-plain fbox-small color mb-15">
                        <div class="fbox-icon"> <i class="icon-instagram"></i> </div>
                        <br>
                        <h3>Instagram</h3>
                        <p><a href="<?= $k['instagram_link']; ?>"><?= $k['instagram']; ?></a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>