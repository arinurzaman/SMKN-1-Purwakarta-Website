<!-- ======= Hero Section ======= -->
<section id="hero" class="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row" data-aos="fade-left">
            <div class="col-md-12 text-center">
              <h1>Profil - SMKN 1 Purwakarta - Kece Abis</h1>
              <hr>
            </div>

            
              <?php foreach($profils as $profil) { ?>
          <div class="col-lg-4 col-md-6 profil">
            <div class="member">
              <div class="pic">
                <a href="{{ asset('profil/read/'.$profil->slug_profil) }}">
                <img src="{{ asset('public/upload/image/'.$profil->gambar) }}" class="img-fluid" alt="<?php  echo $profil->judul_profil ?>" width="150">
                </a>
              </div>

              <div class="member mt-2">
                <h4><?php echo strip_tags($profil->judul_profil) ?></h4>
              </div>
            </div>
          </div>
          <?php } ?>

          <div class="col-md-12 justify-content-center">
            <br><br>
            <hr>
                <p class="text-center">
                  {{ $profils->links() }}
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>