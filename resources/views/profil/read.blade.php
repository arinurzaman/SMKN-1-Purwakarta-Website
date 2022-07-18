<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <div class="kotak">
            <div class="row">
              
              <div class="col-md-12">
                <h1 class="text-center"><?php echo $title ?> SMKN 1 Purwakarta</h1>
                <hr>
              </div>
                
  
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4 profil">
                <div class="row">
                    <figure class="thumnail col-md-4">
                      <a href="{{ asset('profil/detail/'.$profil->slug_profil) }}">
                        <img src="{{ asset('public/upload/image/thumbs/'.$profil->gambar) }}" alt="<?php  echo $profil->judul_profil ?>" class="img-fluid img-thumbnail">
                      </a>
                    </figure>
                    <div class="keterangan col-md-8">
                      <?php echo $profil->isi ?>
      
                    </div>
                    
                  </div>
              </div>
            
        </div>
      </div>
    </div>
  </div>
  </div>
  </section><!-- End Hero -->
  