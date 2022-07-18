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
                
  
              <?php  
              if($prestasis) {
              foreach($prestasis as $prestasi) { ?>
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4 prestasi">
                <div class="row">
                    <figure class="thumnail col-md-4">
                      <a href="{{ asset('prestasi/detail/'.$prestasi->slug_prestasi) }}">
                        <img src="{{ asset('public/upload/image/thumbs/'.$prestasi->gambar) }}" alt="<?php  echo $prestasi->judul_prestasi ?>" class="img-fluid img-thumbnail">
                      </a>
                    </figure>
                    <div class="keterangan col-md-8">
                        <h3>
                          <a href="{{ asset('prestasi/detail/'.$prestasi->slug_prestasi) }}">
                            <?php  echo $prestasi->judul_prestasi ?>
                          </a>
                        </h3>
                      <p class="harga"><?php echo \Illuminate\Support\Str::limit(strip_tags($prestasi->isi), 350, $end='...') ?></p>
                      <div class="link-prestasi">
                        <p>
                          <input type="hidden" name="quantity" id="<?php echo $prestasi->id_prestasi;?>" value="1" class="quantity">
                          <a href="{{ asset('prestasi/read/'.$prestasi->slug_prestasi) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Baca Detail...</a>
                            
                        </p>
                    </div>
                    </div>
                    
                  </div>
              </div>
            <?php } ?>
            <div class="col-md-12">
              <hr>
                  <p class="text-center">
                    {{ $prestasis->links() }}
                  </p>
              </div>
            </div>
            <?php }else{ ?>
            <div class="col-md-12">
              <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
            </div>
            <?php } ?>
            <div class="col-md-12">
              <hr>
            </div>
              <div class="col-md-12">
                
              </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </section><!-- End Hero -->
  