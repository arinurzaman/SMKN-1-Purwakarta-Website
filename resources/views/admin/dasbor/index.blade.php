<div class="alert alert-info">
  Hai <strong>{{ Session()->get('nama') }}</strong>, Selamat datang di Halaman Dashboard Administrator
</div>
<hr>
<div class="row">

          <!-- Card Berita -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Berita</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($Berita) ?></div>
                      <div class="h5 mt-2"><a href="{{asset('admin/berita')}}" class="btn btn-primary btn-sm">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Prestasi -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Prestasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($Prestasi) ?></div>
                      <div class="h5 mt-2"><a href="{{asset('admin/prestasi')}}" class="btn btn-success btn-sm">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-trophy fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Jurusan -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jurusan</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($Jurusan) ?></div>
                          <div class="h5 mt-2"><a href="{{asset('admin/jurusan')}}" class="btn btn-info btn-sm">Lihat</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Industri Pasangan -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Industri Pasangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($Industri) ?></div>
                      <div class="h5 mt-2"><a href="{{asset('admin/industri')}}" class="btn btn-warning btn-sm">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
