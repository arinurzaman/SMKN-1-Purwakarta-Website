<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Prestasi_model;

class Prestasi extends Controller
{
    // Beritapage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Beritapage')->orderBy('id_galeri', 'DESC')->first();
    	// $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    	$model 	= new Prestasi_model();
		$prestasi = $model->listing();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'prestasis'	=> $prestasi,
                        'content'   => 'prestasi/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function read($slug_prestasi)
    {
        $site   = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri','Prestasipage')->orderBy('id_galeri', 'DESC')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Prestasi_model();
        $prestasi = $model->read($slug_prestasi);

        $data = array(  'title'     => $prestasi->judul_prestasi,
                        'deskripsi' => $prestasi->judul_prestasi,
                        'keywords'  => $prestasi->judul_prestasi,
                        'slider'    => $slider,
                        'site'      => $site,
                        'prestasi'    => $prestasi,
                        'content'   => 'prestasi/read'
                    );
        return view('layout/wrapper',$data);
    }
}
