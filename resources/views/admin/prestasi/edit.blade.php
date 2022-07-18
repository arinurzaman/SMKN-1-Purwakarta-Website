<p class="text-right">
    <a href="{{ asset('admin/prestasi') }}" class="btn btn-success btn-sm">
      <i class="fa fa-backward"></i> Kembali
    </a>
  </p>
  <hr>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  
  <form action="{{ asset('admin/prestasi/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{ csrf_field() }}
  <input type="hidden" name="id_prestasi" value="{{ $prestasi->id_prestasi }}">
  <div class="row form-group">
    <label class="col-md-3">Judul prestasi/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="judul_prestasi" class="form-control" placeholder="Judul prestasi/profil/layanan" required="required" value="<?php echo $prestasi->judul_prestasi ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Icon prestasi/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="icon" class="form-control" placeholder="Icon prestasi/profil/layanan" value="<?php echo $prestasi->icon ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Status &amp; Tanggal Publish</label>
  
    <div class="col-md-2">
  <select name="status_prestasi" class="form-control select2">
    <option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if($prestasi->status_prestasi=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
  </select>
  </div>
  <div class="col-md-2">
      <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($prestasi->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
    </div>
    <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($prestasi->tanggal_publish)); } ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Jenis &amp; Kategori Prestasi</label>
    <div class="col-md-3">
  <select name="jenis_prestasi" class="form-control select2">
      <option value="Prestasi">prestasi</option>
      <option value="Profil"  <?php if($prestasi->jenis_prestasi=="Profil") { echo "selected"; } ?>>Profil</option>
    <option value="Layanan"  <?php if($prestasi->jenis_prestasi=="Layanan") { echo "selected"; } ?>>Layanan</option>
    <option value="Keunggulan"  <?php if($prestasi->jenis_prestasi=="Keunggulan") { echo "selected"; } ?>>Keunggulan</option>
  </select>
  </div>
  
  <div class="col-md-3">
  {{-- <label>Kategori prestasi</label> --}}
  <select name="id_kategori" class="form-control select2">
      <?php foreach($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategoriprestasi  ?>"  <?php if($prestasi->id_kategoriprestasi ==$kategori->id_kategoriprestasi ) { echo "selected"; } ?>>
      <?php echo $kategori->nama_kprestasi ?></option>
      <?php } ?>
  </select>
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Upload gambar &amp; Urutan</label>
    <div class="col-md-3">
  <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
  
  <div class="col-md-3">
  <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $prestasi->urutan ?>">
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Keywords dan Ringkasan (untuk pencarian Google)</label>
    <div class="col-md-9">
  <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $prestasi->keywords ?></textarea>
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Isi prestasi</label> 
    <div class="col-md-9">
    <textarea name="isi" class="form-control konten" placeholder="Isi prestasi" placeholder="Isi prestasi"><?php echo $prestasi->isi ?></textarea>
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3"></label>
    <div class="col-md-9">
  <div class="form-group">
  <button type="submit" name="submit" class="btn btn-success ">
    <i class="fa fa-save"></i> Simpan Data
  </button>
  <input type="reset" name="reset" class="btn btn-info " value="Reset">
  </div>
  
  </div>
  
  </div>