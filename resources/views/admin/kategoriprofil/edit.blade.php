<div class="modal fade" id="Edit<?php echo $kategori->id_kategoriprofil ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        
    <form action="{{ asset('admin/kategoriprofil/edit') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_kategoriprofil" value="{{ $kategori->id_kategoriprofil }}">
    <div class="form-group row">
        <label class="col-md-3">Nama Kategori</label>
        <div class="col-md-9">
            <input type="text" name="nama_kprofil" class="form-control" placeholder="Nama kategori profil" value="<?php echo $kategori->nama_kprofil ?>" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">Nomor urut</label>
        <div class="col-md-9">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
    </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3"></label>
        <div class="col-md-9">
    <div class="btn-group">
    <input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    </div>
    </div>
    </div>
    
    <div class="clearfix"></div>
    
    </form>
    
    </div>
    </div>
    </div>
    </div>
    