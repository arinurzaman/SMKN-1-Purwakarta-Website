<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Jurusan_model;

class Jurusan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myjurusan 			= new Jurusan_model();
		$jurusan 			    = $myjurusan->semua();
		$kategori 	            = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'       => 'Data jurusan',
						'jurusan'      => $jurusan,
						'kategori'    => $kategori,
                        'content'     => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $keywords             = $request->keywords;
        $jurusan             = $myjurusan->cari($keywords);
        $kategori             = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Data jurusan',
                        'jurusan'            => $jurusan,
                        'kategori'            => $kategori,
                        'content'             => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_jurusannya       = $request->id_jurusan;
            for($i=0; $i < sizeof($id_jurusannya);$i++) {
                DB::table('jurusan')->where('id_jurusan',$id_jurusannya[$i])->delete();
            }
            return redirect('admin/jurusan')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_jurusannya       = $request->id_jurusan;
            for($i=0; $i < sizeof($id_jurusannya);$i++) {
                DB::table('jurusan')->where('id_jurusan',$id_jurusannya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_jurusan' => 'Draft'
                    ]);
            }
            return redirect('admin/jurusan')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_jurusannya       = $request->id_jurusan;
            for($i=0; $i < sizeof($id_jurusannya);$i++) {
                DB::table('jurusan')->where('id_jurusan',$id_jurusannya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_jurusan' => 'Publish'
                    ]);
            }
            return redirect('admin/jurusan')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_jurusannya       = $request->id_jurusan;
            for($i=0; $i < sizeof($id_jurusannya);$i++) {
                DB::table('jurusan')->where('id_jurusan',$id_jurusannya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategorijurusan'    => $request->id_kategorijurusan
                    ]);
            }
            return redirect('admin/jurusan')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_jurusan($status_jurusan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $jurusan             = $myjurusan->status_jurusan($status_jurusan);
        $kategori             = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Status jurusan: '.$status_jurusan,
                        'jurusan'            => $jurusan,
                        'kategori'            => $kategori,
                        'content'             => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_jurusan($jenis_jurusan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $jurusan             = $myjurusan->jenis_jurusan($jenis_jurusan);
        $kategori    = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'              => 'Jenis jurusan: '.$jenis_jurusan,
                        'jurusan'           => $jurusan,
                        'kategori'           => $kategori,
                        'content'            => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $jurusan             = $myjurusan->author($id_user);
        $kategori    = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();
        $author      = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data jurusan dengan Penulis: '.$author->nama,
                        'jurusan'            => $jurusan,
                        'kategori'           => $kategori,
                        'content'           => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategorijurusan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $jurusan             = $myjurusan->all_kategori($id_kategorijurusan);
        $kategori    = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategorijurusan')->where('id_kategorijurusan',$id_kategorijurusan)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kjurusan,
                        'jurusan'            => $jurusan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/jurusan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
    

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori    = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah jurusan',
                        'kategori'   => $kategori,
                        'content'           => 'admin/jurusan/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_jurusan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myjurusan           = new Jurusan_model();
        $jurusan             = $myjurusan->detail($id_jurusan);
        $kategori    = DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit jurusan',
                        'jurusan'            => $jurusan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/jurusan/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_jurusan'  => 'required|unique:jurusan',
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
            $slug_jurusan = str_slug($request->judul_jurusan, '-');
            DB::table('jurusan')->insert([
                'id_kategorijurusan'       => $request->id_kategorijurusan,
                'id_user'           => Session()->get('id_user'),
                'slug_jurusan'       => $slug_jurusan,
                'judul_jurusan'      => $request->judul_jurusan,
                'isi'               => $request->isi,
                'jenis_jurusan'      => $request->jenis_jurusan,
                'status_jurusan'     => $request->status_jurusan,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_jurusan = str_slug($request->judul_jurusan, '-');
            DB::table('jurusan')->insert([
                'id_kategorijurusan'       => $request->id_kategorijurusan,
                'id_user'           => Session()->get('id_user'),
                'slug_jurusan'       => $slug_jurusan,
                'judul_jurusan'      => $request->judul_jurusan,
                'isi'               => $request->isi,
                'jenis_jurusan'      => $request->jenis_jurusan,
                'status_jurusan'     => $request->status_jurusan,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/jurusan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_jurusan'   => 'required',
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
            $slug_jurusan = str_slug($request->judul_jurusan, '-');
            DB::table('jurusan')->where('id_jurusan',$request->id_jurusan)->update([
                'id_kategorijurusan'       => $request->id_kategorijurusan,
                'id_user'           => Session()->get('id_user'),
                'slug_jurusan'       => $slug_jurusan,
                'judul_jurusan'      => $request->judul_jurusan,
                'isi'               => $request->isi,
                'jenis_jurusan'      => $request->jenis_jurusan,
                'status_jurusan'     => $request->status_jurusan,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_jurusan = str_slug($request->judul_jurusan, '-');
            DB::table('jurusan')->where('id_jurusan',$request->id_jurusan)->update([
                'id_kategorijurusan'       => $request->id_kategorijurusan,
                'id_user'           => Session()->get('id_user'),
                'slug_jurusan'       => $slug_jurusan,
                'judul_jurusan'      => $request->judul_jurusan,
                'isi'               => $request->isi,
                'jenis_jurusan'      => $request->jenis_jurusan,
                'status_jurusan'     => $request->status_jurusan,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        return redirect('admin/jurusan')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_jurusan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('jurusan')->where('id_jurusan',$id_jurusan)->delete();
        return redirect('admin/jurusan')->with(['sukses' => 'Data telah dihapus']);
    }
}
