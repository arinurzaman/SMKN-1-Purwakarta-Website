<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <div class="kotak">
            <div class="row">
              
              <div class="col-md-12">
                <h1 class="text-center"><?php echo $title ?></h1>
                <hr>
              </div>
                
  
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4 prestasi">
                <div class="row">
                    <figure class="thumnail col-md-4">
                      <a href="{{ asset('prestasi/detail/'.$prestasi->slug_prestasi) }}">
                        <img src="{{ asset('public/upload/image/thumbs/'.$prestasi->gambar) }}" alt="<?php  echo $prestasi->judul_prestasi ?>" class="img-fluid img-thumbnail">
                      </a>
                    </figure>
                    <div class="keterangan col-md-8">
                      <?php echo $prestasi->isi ?>
      
                    </div>
                    
                  </div>
              </div>
            
        </div>
      </div>
    </div>
  </div>
  </div>
  </section><!-- End Hero -->
  