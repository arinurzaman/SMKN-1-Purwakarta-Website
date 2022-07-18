<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Jurusan_model;
use Illuminate\Http\Request;

class Jurusan extends Controller
{
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Beritapage')->orderBy('id_galeri', 'DESC')->first();
    	// $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    	$model 	= new Jurusan_model();
		$jurusan = $model->listing();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'jurusans'	=> $jurusan,
                        'content'   => 'jurusan/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function read($slug_jurusan)
    {
        $site   = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri','Jurusanpage')->orderBy('id_galeri', 'DESC')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Jurusan_model();
        $jurusan = $model->read($slug_jurusan);

        $data = array(  'title'     => $jurusan->judul_jurusan,
                        'deskripsi' => $jurusan->judul_jurusan,
                        'keywords'  => $jurusan->judul_jurusan,
                        'slider'    => $slider,
                        'site'      => $site,
                        'jurusan'    => $jurusan,
                        'content'   => 'jurusan/read'
                    );
        return view('layout/wrapper',$data);
    }
}
