<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Industri_model;

class Industri extends Controller
{
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Beritapage')->orderBy('id_galeri', 'DESC')->first();
    	// $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    	$model 	= new Industri_model();
		$industri = $model->listing();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'industris'	=> $industri,
                        'content'   => 'industri/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function read($slug_industri)
    {
        $site   = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri','industripage')->orderBy('id_galeri', 'DESC')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Industri_model();
        $industri = $model->read($slug_industri);

        $data = array(  'title'     => $industri->judul_industri,
                        'deskripsi' => $industri->judul_industri,
                        'keywords'  => $industri->judul_industri,
                        'slider'    => $slider,
                        'site'      => $site,
                        'industri'    => $industri,
                        'content'   => 'industri/read'
                    );
        return view('layout/wrapper',$data);
    }
}
