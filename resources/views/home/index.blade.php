<section id="hero" style="color: #fff;">
  <div class="container">
    <div class="row">
        <div class="owl-carousel owl-theme">
          <?php foreach($slider as $slider) { ?>
          <div class="item">
            <div class="row">
              <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out" class="slideku">
                  <h1><?php echo $slider->judul_galeri ?></h1>
                  <h4><?php echo $slider->isi ?></h4>
                  <div class="text-center text-lg-left">
                    <a href="{{ asset('profil') }}" class="btn-get-started scrollto"><i class="fa fa-eye"></i> INFORMASI PPDB</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="300">
                <div class="slideku">
                  <p class="text-center"><img src="{{ asset('public/upload/image/'.$slider->gambar) }}" class="img img-fluid animated" alt="<?php echo $slider->judul_galeri ?>"></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>
</section><!-- End Hero --><!-- Start main -->
<main id="main">

 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-4 col-lg-6 d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <img src="{{ asset('public/upload/image/pakwawan.jpg') }}" alt="{{ $site->namaweb }}" class="img img-fluid img-thumbnail">
          </div>

          <div class="col-xl-8 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Sambutan Kepala Sekolah</h3>
            <h4>Drs. H. Wawan Cakra Herawan, M.Pd</h4>
            <br>
            <?php echo $site->tentang ?>

          </div>
        </div>

      </div>
      <hr>
    </section><!-- End About Section -->

    <!-- ======= Berita Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <p>Berita terbaru</p>
          <h2><?php echo $site->namaweb ?></h2>
        </div>

        <div class="row">

          <?php  
            if($berita) {
            foreach($berita as $berita) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 berita">
                  <figure class="thumnail">
                    <a href="{{ asset('berita/read/'.$berita->slug_berita) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$berita->gambar) }}" alt="<?php  echo $berita->judul_berita ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="{{ asset('berita/read/'.$berita->slug_berita) }}">
                          <?php  echo $berita->judul_berita ?>
                        </a>
                      </h3>
                    <p class="harga"><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 250, $end='...') ?></p>
                    <div class="link-berita">
                      <p>
                        <input type="hidden" name="quantity" id="<?php echo $berita->id_berita;?>" value="1" class="quantity">
                        <a href="{{ asset('berita/read/'.$berita->slug_berita) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Baca Detail...</a>
                          
                      </p>
                  </div>
                  </div>

                  
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('berita') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat berita lainnya...</a>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Berita Section -->

    <!-- ======= Jurusan Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <p>Kompetensi Keahlian</p>
          <h2><?php echo $site->namaweb ?></h2>
        </div>

        <div class="row">

          <?php  
            if($jurusan) {
            foreach($jurusan as $jurusan) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 jurusan text-center">
                  <figure class="thumnail">
                    <a href="{{ asset('jurusan/read/'.$jurusan->slug_jurusan) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$jurusan->gambar) }}" alt="<?php  echo $jurusan->judul_jurusan ?>" class="img-fluid" width="200">
                    </a>
                  </figure>
                  
                  
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('jurusan') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat jurusan lainnya...</a>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Jurusan Section -->

     <!-- ======= Prestasi Section ======= -->
     <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <p>Prestasi</p>
          <h2><?php echo $site->namaweb ?></h2>
        </div>

        <div class="row">

          <?php  
            if($prestasi) {
            foreach($prestasi as $prestasi) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 prestasi">
                  <figure class="thumnail">
                    <a href="{{ asset('prestasi/read/'.$prestasi->slug_prestasi) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$prestasi->gambar) }}" alt="<?php  echo $prestasi->judul_prestasi ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="{{ asset('prestasi/read/'.$prestasi->slug_prestasi) }}">
                          <?php  echo $prestasi->judul_prestasi ?>
                        </a>
                      </h3>
                    <p class="harga"><?php echo \Illuminate\Support\Str::limit(strip_tags($prestasi->isi), 250, $end='...') ?></p>
                    <div class="link-prestasi">
                      <p>
                        <input type="hidden" name="quantity" id="<?php echo $prestasi->id_prestasi;?>" value="1" class="quantity">
                        <a href="{{ asset('prestasi/read/'.$prestasi->slug_prestasi) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Baca Detail...</a>
                          
                      </p>
                  </div>
                  </div>
                  
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('prestasi') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat prestasi lainnya...</a>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Prestasi Section -->



    <!-- ======= Industri Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <p>Industri Pasangan</p>
          <h2><?php echo $site->namaweb ?></h2>
        </div>

        <div class="row">

          <?php  
            if($industri) {
            foreach($industri as $industri) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 industri text-center">
                  <figure class="thumnail">
                    <a href="{{ asset('industri/read/'.$industri->slug_industri) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$industri->gambar) }}" alt="<?php  echo $industri->judul_industri ?>" class="img-fluid" width="150">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="{{ asset('industri/read/'.$industri->slug_industri) }}">
                          <?php  echo $industri->judul_industri ?>
                        </a>
                      </h3>  
                  </div>
                  
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('industri') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat industri pasangan lainnya...</a>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Industri Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <h2>Teaching Factory</h2>
          <p><?php echo $site->namaweb ?></p>
        </div>

        
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('berita') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat lainnya...</a>
            </p>
            
          </div>

      </div>
    </section><!-- End Contact Section -->



</main>
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>