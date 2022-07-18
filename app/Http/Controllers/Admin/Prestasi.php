<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Prestasi_model;


class Prestasi extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myprestasi 			= new Prestasi_model();
		$prestasi 			    = $myprestasi->semua();
		$kategori 	            = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

		$data = array(  'title'       => 'Data Prestasi',
						'prestasi'      => $prestasi,
						'kategori'    => $kategori,
                        'content'     => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $keywords             = $request->keywords;
        $prestasi             = $myprestasi->cari($keywords);
        $kategori             = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Data Prestasi',
                        'prestasi'            => $prestasi,
                        'kategori'            => $kategori,
                        'content'             => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_prestasinya       = $request->id_prestasi;
            for($i=0; $i < sizeof($id_prestasinya);$i++) {
                DB::table('prestasi')->where('id_prestasi',$id_prestasinya[$i])->delete();
            }
            return redirect('admin/prestasi')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_prestasinya       = $request->id_prestasi;
            for($i=0; $i < sizeof($id_prestasinya);$i++) {
                DB::table('prestasi')->where('id_prestasi',$id_prestasinya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_prestasi' => 'Draft'
                    ]);
            }
            return redirect('admin/prestasi')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_prestasinya       = $request->id_prestasi;
            for($i=0; $i < sizeof($id_prestasinya);$i++) {
                DB::table('prestasi')->where('id_prestasi',$id_prestasinya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_prestasi' => 'Publish'
                    ]);
            }
            return redirect('admin/prestasi')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_prestasinya       = $request->id_prestasi;
            for($i=0; $i < sizeof($id_prestasinya);$i++) {
                DB::table('prestasi')->where('id_prestasi',$id_prestasinya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategoriprestasi'    => $request->id_kategoriprestasi
                    ]);
            }
            return redirect('admin/prestasi')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_prestasi($status_prestasi)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $prestasi             = $myprestasi->status_prestasi($status_prestasi);
        $kategori             = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Status Prestasi: '.$status_prestasi,
                        'prestasi'            => $prestasi,
                        'kategori'            => $kategori,
                        'content'             => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_prestasi($jenis_prestasi)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $prestasi             = $myprestasi->jenis_prestasi($jenis_prestasi);
        $kategori    = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

        $data = array(  'title'              => 'Jenis Prestasi: '.$jenis_prestasi,
                        'prestasi'           => $prestasi,
                        'kategori'           => $kategori,
                        'content'            => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $prestasi             = $myprestasi->author($id_user);
        $kategori    = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();
        $author      = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Prestasi dengan Penulis: '.$author->nama,
                        'prestasi'            => $prestasi,
                        'kategori'           => $kategori,
                        'content'           => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategoriprestasi)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $prestasi             = $myprestasi->all_kategori($id_kategoriprestasi);
        $kategori    = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategoriprestasi')->where('id_kategoriprestasi',$id_kategoriprestasi)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kprestasi,
                        'prestasi'            => $prestasi,
                        'kategori'   => $kategori,
                        'content'           => 'admin/prestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
    

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori    = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Prestasi',
                        'kategori'   => $kategori,
                        'content'           => 'admin/prestasi/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_prestasi)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprestasi           = new Prestasi_model();
        $prestasi             = $myprestasi->detail($id_prestasi);
        $kategori    = DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Prestasi',
                        'prestasi'            => $prestasi,
                        'kategori'   => $kategori,
                        'content'           => 'admin/prestasi/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_prestasi'  => 'required|unique:prestasi',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = public_path('upload/image/thumbs/');
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = public_path('upload/image/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_prestasi = str_slug($request->judul_prestasi, '-');
            DB::table('prestasi')->insert([
                'id_kategoriprestasi'       => $request->id_kategoriprestasi,
                'id_user'           => Session()->get('id_user'),
                'slug_prestasi'       => $slug_prestasi,
                'judul_prestasi'      => $request->judul_prestasi,
                'isi'               => $request->isi,
                'jenis_prestasi'      => $request->jenis_prestasi,
                'status_prestasi'     => $request->status_prestasi,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_prestasi = str_slug($request->judul_prestasi, '-');
            DB::table('prestasi')->insert([
                'id_kategoriprestasi'       => $request->id_kategoriprestasi,
                'id_user'           => Session()->get('id_user'),
                'slug_prestasi'       => $slug_prestasi,
                'judul_prestasi'      => $request->judul_prestasi,
                'isi'               => $request->isi,
                'jenis_prestasi'      => $request->jenis_prestasi,
                'status_prestasi'     => $request->status_prestasi,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/prestasi')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_prestasi'   => 'required',
                            'isi'           => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = public_path('upload/image/thumbs/');
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = public_path('upload/image/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_prestasi = str_slug($request->judul_prestasi, '-');
            DB::table('prestasi')->where('id_prestasi',$request->id_prestasi)->update([
                'id_kategoriprestasi'       => $request->id_kategoriprestasi,
                'id_user'           => Session()->get('id_user'),
                'slug_prestasi'       => $slug_prestasi,
                'judul_prestasi'      => $request->judul_prestasi,
                'isi'               => $request->isi,
                'jenis_prestasi'      => $request->jenis_prestasi,
                'status_prestasi'     => $request->status_prestasi,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_prestasi = str_slug($request->judul_prestasi, '-');
            DB::table('prestasi')->where('id_prestasi',$request->id_prestasi)->update([
                'id_kategoriprestasi'       => $request->id_kategoriprestasi,
                'id_user'           => Session()->get('id_user'),
                'slug_prestasi'       => $slug_prestasi,
                'judul_prestasi'      => $request->judul_prestasi,
                'isi'               => $request->isi,
                'jenis_prestasi'      => $request->jenis_prestasi,
                'status_prestasi'     => $request->status_prestasi,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        return redirect('admin/prestasi')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_prestasi)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('prestasi')->where('id_prestasi',$id_prestasi)->delete();
        return redirect('admin/prestasi')->with(['sukses' => 'Data telah dihapus']);
    }
}
