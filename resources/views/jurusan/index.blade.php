<!-- ======= Hero Section ======= -->
<section id="hero" class="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="300">
        <div class="kotak">
          <div class="row" data-aos="fade-left">
            <div class="col-md-12 text-center">
              <h1>Kompetensi Keahlian - SMKN 1 Purwakarta - Kece Abis</h1>
              <hr>
            </div>

            
              <?php foreach($jurusans as $jurusan) { ?>
          <div class="col-lg-4 col-md-6 jurusan">
            <div class="member">
              <div class="pic">
                <a href="{{ asset('jurusan/read/'.$jurusan->slug_jurusan) }}">
                <img src="{{ asset('public/upload/image/'.$jurusan->gambar) }}" class="img-fluid" alt="<?php  echo $jurusan->judul_jurusan ?>" width="150">
                </a>
              </div>
              
            </div>
          </div>
          <?php } ?>

          <div class="col-md-12 justify-content-center">
            <br><br>
            <hr>
                <p class="text-center">
                  {{ $jurusans->links() }}
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>