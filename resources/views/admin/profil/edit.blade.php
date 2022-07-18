<p class="text-right">
    <a href="{{ asset('admin/profil') }}" class="btn btn-success btn-sm">
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
  
  <form action="{{ asset('admin/profil/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{ csrf_field() }}
  <input type="hidden" name="id_profil" value="{{ $profil->id_profil }}">
  <div class="row form-group">
    <label class="col-md-3">Judul profil/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="judul_profil" class="form-control" placeholder="Judul profil/profil/layanan" required="required" value="<?php echo $profil->judul_profil ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Icon profil/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="icon" class="form-control" placeholder="Icon profil/profil/layanan" value="<?php echo $profil->icon ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Status &amp; Tanggal Publish</label>
  
    <div class="col-md-2">
  <select name="status_profil" class="form-control select2">
    <option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if($profil->status_profil=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
  </select>
  </div>
  <div class="col-md-2">
      <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($profil->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
    </div>
    <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($profil->tanggal_publish)); } ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Jenis &amp; Kategori Profil</label>
    <div class="col-md-3">
  <select name="jenis_profil" class="form-control select2">
      <option value="Profil">profil</option>
      <option value="Profil"  <?php if($profil->jenis_profil=="Profil") { echo "selected"; } ?>>Profil</option>
    <option value="Layanan"  <?php if($profil->jenis_profil=="Layanan") { echo "selected"; } ?>>Layanan</option>
    <option value="Keunggulan"  <?php if($profil->jenis_profil=="Keunggulan") { echo "selected"; } ?>>Keunggulan</option>
  </select>
  </div>
  
  <div class="col-md-3">
  {{-- <label>Kategori profil</label> --}}
  <select name="id_kategori" class="form-control select2">
      <?php foreach($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategoriprofil  ?>"  <?php if($profil->id_kategoriprofil ==$kategori->id_kategoriprofil ) { echo "selected"; } ?>>
      <?php echo $kategori->nama_kprofil ?></option>
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
  <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $profil->urutan ?>">
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Keywords dan Ringkasan (untuk pencarian Google)</label>
    <div class="col-md-9">
  <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $profil->keywords ?></textarea>
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Isi profil</label> 
    <div class="col-md-9">
    <textarea name="isi" class="form-control konten" placeholder="Isi profil" placeholder="Isi profil"><?php echo $profil->isi ?></textarea>
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