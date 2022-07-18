<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Industri_model;

class Industri extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myindustri 			= new Industri_model();
		$industri 			    = $myindustri->semua();
		$kategori 	            = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

		$data = array(  'title'       => 'Data industri',
						'industri'      => $industri,
						'kategori'    => $kategori,
                        'content'     => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $keywords             = $request->keywords;
        $industri             = $myindustri->cari($keywords);
        $kategori             = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Data industri',
                        'industri'            => $industri,
                        'kategori'            => $kategori,
                        'content'             => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_industrinya       = $request->id_industri;
            for($i=0; $i < sizeof($id_industrinya);$i++) {
                DB::table('industri')->where('id_industri',$id_industrinya[$i])->delete();
            }
            return redirect('admin/industri')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_industrinya       = $request->id_industri;
            for($i=0; $i < sizeof($id_industrinya);$i++) {
                DB::table('industri')->where('id_industri',$id_industrinya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_industri' => 'Draft'
                    ]);
            }
            return redirect('admin/industri')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_industrinya       = $request->id_industri;
            for($i=0; $i < sizeof($id_industrinya);$i++) {
                DB::table('industri')->where('id_industri',$id_industrinya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_industri' => 'Publish'
                    ]);
            }
            return redirect('admin/industri')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_industrinya       = $request->id_industri;
            for($i=0; $i < sizeof($id_industrinya);$i++) {
                DB::table('industri')->where('id_industri',$id_industrinya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategoriindustri'    => $request->id_kategoriindustri
                    ]);
            }
            return redirect('admin/industri')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_industri($status_industri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $industri             = $myindustri->status_industri($status_industri);
        $kategori             = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'               => 'Status industri: '.$status_industri,
                        'industri'            => $industri,
                        'kategori'            => $kategori,
                        'content'             => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function jenis_industri($jenis_industri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $industri             = $myindustri->jenis_industri($jenis_industri);
        $kategori    = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'              => 'Jenis industri: '.$jenis_industri,
                        'industri'           => $industri,
                        'kategori'           => $kategori,
                        'content'            => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Status
    public function author($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $industri             = $myindustri->author($id_user);
        $kategori    = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();
        $author      = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','ASC')->first();

        $data = array(  'title'             => 'Data industri dengan Penulis: '.$author->nama,
                        'industri'            => $industri,
                        'kategori'           => $kategori,
                        'content'           => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategoriindustri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $industri             = $myindustri->all_kategori($id_kategoriindustri);
        $kategori    = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();
        $detail      = DB::table('kategoriindustri')->where('id_kategoriindustri',$id_kategoriindustri)->first();
        $data = array(  'title'             => 'Kategori: '.$detail->nama_kindustri,
                        'industri'            => $industri,
                        'kategori'   => $kategori,
                        'content'           => 'admin/industri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
    

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori    = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah industri',
                        'kategori'   => $kategori,
                        'content'           => 'admin/industri/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_industri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myindustri           = new Industri_model();
        $industri             = $myindustri->detail($id_industri);
        $kategori    = DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit industri',
                        'industri'            => $industri,
                        'kategori'   => $kategori,
                        'content'           => 'admin/industri/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_industri'  => 'required|unique:industri',
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
            $slug_industri = str_slug($request->judul_industri, '-');
            DB::table('industri')->insert([
                'id_kategoriindustri'       => $request->id_kategoriindustri,
                'id_user'           => Session()->get('id_user'),
                'slug_industri'       => $slug_industri,
                'judul_industri'      => $request->judul_industri,
                'isi'               => $request->isi,
                'jenis_industri'      => $request->jenis_industri,
                'status_industri'     => $request->status_industri,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            $slug_industri = str_slug($request->judul_industri, '-');
            DB::table('industri')->insert([
                'id_kategoriindustri'       => $request->id_kategoriindustri,
                'id_user'           => Session()->get('id_user'),
                'slug_industri'       => $slug_industri,
                'judul_industri'      => $request->judul_industri,
                'isi'               => $request->isi,
                'jenis_industri'      => $request->jenis_industri,
                'status_industri'     => $request->status_industri,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/industri')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_industri'   => 'required',
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
            $slug_industri = str_slug($request->judul_industri, '-');
            DB::table('industri')->where('id_industri',$request->id_industri)->update([
                'id_kategoriindustri'       => $request->id_kategoriindustri,
                'id_user'           => Session()->get('id_user'),
                'slug_industri'       => $slug_industri,
                'judul_industri'      => $request->judul_industri,
                'isi'               => $request->isi,
                'jenis_industri'      => $request->jenis_industri,
                'status_industri'     => $request->status_industri,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }else{
            $slug_industri = str_slug($request->judul_industri, '-');
            DB::table('industri')->where('id_industri',$request->id_industri)->update([
                'id_kategoriindustri'       => $request->id_kategoriindustri,
                'id_user'           => Session()->get('id_user'),
                'slug_industri'       => $slug_industri,
                'judul_industri'      => $request->judul_industri,
                'isi'               => $request->isi,
                'jenis_industri'      => $request->jenis_industri,
                'status_industri'     => $request->status_industri,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d',strtotime($request->tanggal_publish)).' '.$request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        return redirect('admin/industri')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_industri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('industri')->where('id_industri',$id_industri)->delete();
        return redirect('admin/industri')->with(['sukses' => 'Data telah dihapus']);
    }
}
