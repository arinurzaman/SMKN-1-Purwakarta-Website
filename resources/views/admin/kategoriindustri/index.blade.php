<p>
    @include('admin/kategoriindustri/tambah')
    </p>
    
    <table class="table table-bordered" id="example1">
    <thead>
    <tr>
        <th width="5%">NO</th>
        <th width="25%">NAMA KATEGORI</th>
        <th width="25%">SLUG</th>
        <th width="10%">NO URUT</th>
        <th width="10%">AKSI</th>
    </tr>
    </thead>
    <tbody>
    
    <?php $i=1; foreach($kategoriindustri as $kategori) { ?>
    
    <tr>
        <td class="text-center"><?php echo $i ?></td>
        <td><?php echo $kategori->nama_kindustri?></td>
        <td><?php echo $kategori->slug_kindustri ?></td>
        <td><?php echo $kategori->urutan ?></td>
        <td>
          <div class="btn-group">
          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori->id_kategoriindustri ?>">
        <i class="fa fa-edit"></i> Edit
    </button>
          <a href="{{ asset('admin/kategori/delete/'.$kategori->id_kategoriindustri) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
          </div>
          @include('admin/kategoriindustri/edit')
        </td>
    </tr>
    
    <?php $i++; } ?>
    
    </tbody>
    </table>