<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Profil_model;

class Profil extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myprofil 			= new Profil_model();
		$profil 			    = $myprofil->semua();
		$kategori 	            = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

		$data = array(  'title'       => 'Data profil',
						'profil'      => $profil,
						'kategori'    => $kategori,
                        'content'     => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $keywords             = $request->keywords;
        $profil             = $myprofil->cari($keywords);
        $kategori             = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Data Profil',
                        'profil'            => $profil,
                        'kategori'            => $kategori,
                        'content'             => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof($id_profilnya);$i++) {
                DB::table('profil')->where('id_profil',$id_profilnya[$i])->delete();
            }
            return redirect('admin/profil')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof($id_profilnya);$i++) {
                DB::table('profil')->where('id_profil',$id_profilnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_profil' => 'Draft'
                    ]);
            }
            return redirect('admin/profil')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof($id_profilnya);$i++) {
                DB::table('profil')->where('id_profil',$id_profilnya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_profil' => 'Publish'
                    ]);
            }
            return redirect('admin/profil')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof($id_profilnya);$i++) {
                DB::table('profil')->where('id_profil',$id_profilnya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategoriprofil'    => $request->id_kategoriprofil
                    ]);
            }
            return redirect('admin/profil')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_profil($status_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->status_profil($status_profil);
        $kategori             = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Status Profil: '.$status_profil,
                        'profil'            => $profil,
                        'kategori'            => $kategori,
                        'content'             => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_profil($jenis_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->jenis_profil($jenis_profil);
        $kategori    = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'              => 'Jenis profil: '.$jenis_profil,
                        'profil'           => $profil,
                        'kategori'           => $kategori,
                        'content'            => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->author($id_user);
        $kategori    = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();
        $author      = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data Profil dengan Penulis: '.$author->nama,
                        'profil'            => $profil,
                        'kategori'           => $kategori,
                        'content'           => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategoriprofil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->all_kategori($id_kategoriprofil);
        $kategori    = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategoriprofil')->where('id_kategoriprofil',$id_kategoriprofil)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kprofil,
                        'profil'            => $profil,
                        'kategori'   => $kategori,
                        'content'           => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
    

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori    = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah profil',
                        'kategori'   => $kategori,
                        'content'           => 'admin/profil/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->detail($id_profil);
        $kategori    = DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit profil',
                        'profil'            => $profil,
                        'kategori'   => $kategori,
                        'content'           => 'admin/profil/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_profil'  => 'required|unique:profil',
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
            $slug_profil = str_slug($request->judul_profil, '-');
            DB::table('profil')->insert([
                'id_kategoriprofil'       => $request->id_kategoriprofil,
                'id_user'           => Session()->get('id_user'),
                'slug_profil'       => $slug_profil,
                'judul_profil'      => $request->judul_profil,
                'isi'               => $request->isi,
                'jenis_profil'      => $request->jenis_profil,
                'status_profil'     => $request->status_profil,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_profil = str_slug($request->judul_profil, '-');
            DB::table('profil')->insert([
                'id_kategoriprofil'       => $request->id_kategoriprofil,
                'id_user'           => Session()->get('id_user'),
                'slug_profil'       => $slug_profil,
                'judul_profil'      => $request->judul_profil,
                'isi'               => $request->isi,
                'jenis_profil'      => $request->jenis_profil,
                'status_profil'     => $request->status_profil,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/profil')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_profil'   => 'required',
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
            $slug_profil = str_slug($request->judul_profil, '-');
            DB::table('profil')->where('id_profil',$request->id_profil)->update([
                'id_kategoriprofil'       => $request->id_kategoriprofil,
                'id_user'           => Session()->get('id_user'),
                'slug_profil'       => $slug_profil,
                'judul_profil'      => $request->judul_profil,
                'isi'               => $request->isi,
                'jenis_profil'      => $request->jenis_profil,
                'status_profil'     => $request->status_profil,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_profil = str_slug($request->judul_profil, '-');
            DB::table('profil')->where('id_profil',$request->id_profil)->update([
                'id_kategoriprofil'       => $request->id_kategoriprofil,
                'id_user'           => Session()->get('id_user'),
                'slug_profil'       => $slug_profil,
                'judul_profil'      => $request->judul_profil,
                'isi'               => $request->isi,
                'jenis_profil'      => $request->jenis_profil,
                'status_profil'     => $request->status_profil,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        return redirect('admin/profil')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('profil')->where('id_profil',$id_profil)->delete();
        return redirect('admin/profil')->with(['sukses' => 'Data telah dihapus']);
    }
}
