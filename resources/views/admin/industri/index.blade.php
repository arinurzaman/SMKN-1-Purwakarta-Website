<form action="{{ asset('admin/industri/proses') }}" method="post" accept-charset="utf-8">
    <?php $site   = DB::table('konfigurasi')->first(); ?>
    {{ csrf_field() }}
    <p class="btn-group">
      
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
          <i class="fas fa-trash-alt"></i>
        </button> 
      <button class="btn btn-warning" type="submit" name="draft" onClick="check();" >
          <i class="fa fa-times"></i> Draft
      </button>
    
       <button class="btn btn-primary" type="submit" name="publish" onClick="check();" >
          <i class="fa fa-check"></i> Publish
      </button>
    
      
        <a href="{{ asset('admin/industri/tambah') }}" class="btn btn-success ">
      <i class="fa fa-plus"></i> Tambah Baru</a>
    
    </p>
    <div class="table-responsive mailbox-messages">
    <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr class="bg-primary">
            <th width="5%">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                    </button>
                </div>
            </th>
        <th width="10%" class="text-white">GAMBAR</th>
        <th width="25%" class="text-white">INDUSTRI</th>
        <th width="10%" class="text-white">STATUS</th>
        <th width="10%" class="text-white">AUTHOR</th>
        <th width="15%" class="text-white">ACTION</th>
    </tr>
    </thead>
    <tbody>
    
    <?php $i=1; foreach($industri as $industri) { ?>
    
    <tr class="odd gradeX">
        <td class="text-center">
          <div class="icheck-primary">
            <input type="checkbox" class="icheckbox_flat-blue " name="id_industri[]" value="<?php echo $industri->id_industri ?>">
            <label for="check<?php echo $i ?>"></label>
          </div>
        </td>
        <td>
        <?php if($industri->gambar!="") { ?>
          <img src="{{ asset('public/upload/image/thumbs/'.$industri->gambar) }}" class="img img-thumbnail img-responsive" >
          <?php }else{ ?>
          <img src="{{ asset('public/upload/image/thumbs/'.$site->icon) }}" class="img img-thumbnail img-responsive" >
          <?php } ?>
        </td>
        <td>
        <a href="{{ asset('admin/industri/edit/'.$industri->id_industri) }}">
        <?php echo $industri->judul_industri ?> <sup><i class="fa fa-pencil"></i></sup>
        </a>
          <small>
            <br>Diposting: <?php echo date('d M Y H:i: s',strtotime($industri->tanggal_post)) ?>
            <br>Diterbitkan: <?php echo date('d M Y H:i: s',strtotime($industri->tanggal_publish)) ?>
            <?php if($industri->jenis_industri=="Promo") { ?>
              <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y',strtotime($industri->tanggal_mulai)) ?> s/d <?php echo date('d M Y ',strtotime($industri->tanggal_selesai)) ?></strong></span>
            <?php } ?>
            <br>Urutan: <?php echo $industri->urutan ?>
            <br>Icon: <i class="<?php echo $industri->icon ?>"></i> <?php echo $industri->icon ?>
            <br>Tgl posting: <?php echo date('d-m-Y',strtotime($industri->tanggal_publish)) ?>
          </small>
        </td>
        
        <td><a href="{{ asset('admin/industri/status_industri/'.$industri->status_industri) }}">
          <span class="btn btn-sm <?php if($industri->status_industri=="Publish") { echo 'btn-success'; }else{ echo 'btn-warning'; } ?> btn-block">
            <i class="fa <?php if($industri->status_industri=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $industri->status_industri ?></span>
        </a></td>
        <td>
        <a href="{{ asset('admin/industri/author/'.$industri->id_user) }}">
        <?php echo $industri->nama ?><sup><i class="fa fa-link"></i></sup>
        </a></td>
        <td>
          <div class="btn-group">
            <a href="{{ asset('industri/read/'.$industri->slug_industri) }}" 
            class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
    
            <a href="{{ asset('admin/industri/edit/'.$industri->id_industri) }}" 
            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
    
            <a href="{{ asset('admin/industri/delete/'.$industri->id_industri) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
          </div>
        </td>
    </tr>
    
    <?php $i++; } ?>
    
    </tbody>
    </table>
    </div>
    </form>