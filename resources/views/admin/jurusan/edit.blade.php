<p class="text-right">
    <a href="{{ asset('admin/jurusan') }}" class="btn btn-success btn-sm">
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
  
  <form action="{{ asset('admin/jurusan/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{ csrf_field() }}
  <input type="hidden" name="id_jurusan" value="{{ $jurusan->id_jurusan }}">
  <div class="row form-group">
    <label class="col-md-3">Judul jurusan/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="judul_jurusan" class="form-control" placeholder="Judul jurusan/profil/layanan" required="required" value="<?php echo $jurusan->judul_jurusan ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Icon jurusan/profil/layanan</label>
    <div class="col-md-6">
      <input type="text" name="icon" class="form-control" placeholder="Icon jurusan/profil/layanan" value="<?php echo $jurusan->icon ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Status &amp; Tanggal Publish</label>
  
    <div class="col-md-2">
  <select name="status_jurusan" class="form-control select2">
    <option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if($jurusan->status_jurusan=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
  </select>
  </div>
  <div class="col-md-2">
      <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($jurusan->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
    </div>
    <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s',strtotime($jurusan->tanggal_publish)); } ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Jenis &amp; Kategori Jurusan</label>
    <div class="col-md-3">
  <select name="jenis_jurusan" class="form-control select2">
      <option value="Jurusan">jurusan</option>
      <option value="Profil"  <?php if($jurusan->jenis_jurusan=="Profil") { echo "selected"; } ?>>Profil</option>
    <option value="Layanan"  <?php if($jurusan->jenis_jurusan=="Layanan") { echo "selected"; } ?>>Layanan</option>
    <option value="Keunggulan"  <?php if($jurusan->jenis_jurusan=="Keunggulan") { echo "selected"; } ?>>Keunggulan</option>
  </select>
  </div>
  
  <div class="col-md-3">
  {{-- <label>Kategori jurusan</label> --}}
  <select name="id_kategorijurusan" class="form-control select2">
      <?php foreach($kategori as $kategori) { ?>
      <option value="<?php echo $kategori->id_kategorijurusan ?>"  <?php if($jurusan->id_kategorijurusan==$kategori->id_kategorijurusan) { echo "selected"; } ?>>
      <?php echo $kategori->nama_kjurusan ?></option>
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
  <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $jurusan->urutan ?>">
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Keywords dan Ringkasan (untuk pencarian Google)</label>
    <div class="col-md-9">
  <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $jurusan->keywords ?></textarea>
  </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Isi jurusan</label> 
    <div class="col-md-9">
    <textarea name="isi" class="form-control konten" placeholder="Isi jurusan" placeholder="Isi jurusan"><?php echo $jurusan->isi ?></textarea>
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