<!-- ======= Hero Section ======= -->
<section id="hero" class="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="300">
          <div class="kotak">
            <div class="row" data-aos="fade-left">
              <div class="col-md-12 text-center">
                <h1>Industri Pasangan - SMKN 1 Purwakarta - Kece Abis</h1>
                <hr>
              </div>
  
              
                <?php foreach($industris as $industri) { ?>
            <div class="col-lg-4 col-md-6 industri">
              <div class="member">
                <div class="pic">
                  <a href="{{ asset('industri/read/'.$industri->slug_industri) }}">
                  <img src="{{ asset('public/upload/image/'.$industri->gambar) }}" class="img-fluid" alt="<?php  echo $industri->judul_industri ?>" width="150">
                  </a>
                </div>
                <div class="member mt-2">
                  <h4><?php echo strip_tags($industri->judul_industri) ?></h4>
                </div>
                
              </div>
            </div>
            <?php } ?>
  
            <div class="col-md-12 justify-content-center">
              <br><br>
              <hr>
                  <p class="text-center">
                    {{ $industris->links() }}
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>