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
  
  <form action="{{ asset('admin/profil/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{ csrf_field() }}
  <div class="row form-group">
    <label class="col-md-3">Judul profil</label>
    <div class="col-md-6">
      <input type="text" name="judul_profil" class="form-control form-control-lg" placeholder="Judul profil" required="required" value="{{ old('judul_profil') }}">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Icon profil</label>
    <div class="col-md-6">
      <input type="text" name="icon" class="form-control" placeholder="Icon profil" value="{{ old('icon') }}">
      <small class="text-success">Icon menggunakan Fontawesome. Kunjungi <a href="https://fontawesome.com/" target="_blank">https://fontawesome.com/</a></small>
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Status, Tanggal &amp; Jam Publish</label>
    <div class="col-md-2">
      <select name="status_profil" class="form-control select2">
        <option value="Publish">Publikasikan</option>
        <option value="Draft">Simpan sebagai draft</option>}
      </select>
    </div>
    <div class="col-md-2">
      <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
    </div>
    <div class="col-md-2">
      <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s'); } ?>">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Jenis &amp; Kategori Profil</label>
    <div class="col-md-3">
      <select name="jenis_profil" class="form-control select2">
       <option value="profil">profil</option>
       <option value="Profil">Profil</option>
       <option value="Layanan">Layanan</option>
       <option value="Keunggulan">Keunggulan</option>
     </select>
   </div>
   <div class="col-md-3">
    <select name="id_kategoriprofil" class="form-control select2">
     <?php foreach($kategori as $kategori) { ?>
       <option value="<?php echo $kategori->id_kategoriprofil ?>"><?php echo $kategori->nama_kprofil ?></option>
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
      <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Keywords dan Ringkasan<br>(untuk pencarian Google)</label>
    <div class="col-md-6">
      <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)">{{ old('keywords') }}</textarea>
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3">Isi Profil</label> 
    <div class="col-md-9">
      <textarea name="isi" class="form-control konten" placeholder="Isi profil">{{ old('isi') }}</textarea>
    </div>
  </div>
  
  <div class="row form-group">
    <label class="col-md-3"></label>
    <div class="col-md-9">
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
        <input type="reset" name="reset" class="btn btn-info " value="Reset">
      </div>
    </div>
  </div>
  </form>
  
  