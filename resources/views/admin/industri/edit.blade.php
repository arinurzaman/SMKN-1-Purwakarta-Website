<p class="text-right">
    <a href="{{ asset('admin/industri') }}" class="btn btn-success btn-sm">
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
  
  <form action="{{ asset('admin/industri/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{ csrf_field() }}
  <input type="hidden" name="id_industri" value="{{ $industri->id_industri }}">
  <div class="row form-group">
    <label class="col-md-3">Judul industri/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="judul_industri" class="form-control" placeholder="Judul industri/profil/layanan" required="required" value="<?php echo $industri->judul_industri ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Icon industri/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="icon" class="form-control" placeholder="Icon industri/profil/layanan" value="<?php echo $industri->icon ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Status &amp; Tanggal Publish</label>
  
    <div class="col-md-2">
  <select name="status_industri" class="form-control select2">
    <option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if($industri->status_industri=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
  </select>
  </div>
  <div class="col-md-2">
      <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($industri->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
    </div>
    <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($industri->tanggal_publish)); } ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Jenis &amp; Kategori industri</label>
    <div class="col-md-3">
  <select name="jenis_industri" class="form-control select2">
      <option value="Industri">industri</option>
      <option value="Profil"  <?php if($industri->jenis_industri=="Profil") { echo "selected"; } ?>>Profil</option>
    <option value="Layanan"  <?php if($industri->jenis_industri=="Layanan") { echo "selected"; } ?>>Layanan</option>
    <option value="Keunggulan"  <?php if($industri->jenis_industri=="Keunggulan") { echo "selected"; } ?>>Keunggulan</option>
  </select>
  </div>
  
  <div class="col-md-3">
  {{-- <label>Kategori industri</label> --}}
  <select name="id_kategoriindustri" class="form-control select2">
      <?php foreach($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategoriindustri ?>"  <?php if($industri->id_kategoriindustri==$kategori->id_kategoriindustri) { echo "selected"; } ?>>
      <?php echo $kategori->nama_kindustri ?></option>
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
  <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $industri->urutan ?>">
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Keywords dan Ringkasan (untuk pencarian Google)</label>
    <div class="col-md-9">
  <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $industri->keywords ?></textarea>
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Isi industri</label> 
    <div class="col-md-9">
    <textarea name="isi" class="form-control konten" placeholder="Isi industri" placeholder="Isi industri"><?php echo $industri->isi ?></textarea>
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