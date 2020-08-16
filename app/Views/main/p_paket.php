 <div class="site-section bg-img2" style="background-image: url(img/hero4.png)" id="paket-section">
     <div class="container">
         <div class="row mt-5 mb-5 ">
             <div class="col-md-9">
                 <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Paket Penjualan</h2>
                 <p class="lead" data-aos="fade-up" data-aos-delay="100">Tersedia banyak paket penjualan yang diapat dipilih oleh pembeli.</p>
             </div>
         </div>
         <div class="featured_candidates_area ">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="candidate_active owl-carousel">
                             <?php foreach ($paket as $p) : ?>
                                 <div class="single_candidates text-center">
                                     <div class="thumb">
                                         <img src="img/<?= $p['image']; ?>" alt="">
                                     </div>
                                     <a href="#">
                                         <h4><?= $p['nama_paket']; ?></h4>
                                     </a>
                                     <p class="mb-3"><?= $p['deskripsi_paket']; ?></p>
                                     <a href="#" class="btn btn-thirdnary"><?= $p['harga_paket']; ?></a>
                                 </div>
                             <?php endforeach; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>