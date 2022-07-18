<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profil_model;

class Profil extends Controller
{
// Beritapage
public function index()
{
    $site 	= DB::table('konfigurasi')->first();
    $slider = DB::table('galeri')->where('jenis_galeri','Profilpage')->orderBy('id_galeri', 'DESC')->first();
    // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    $model 	= new Profil_model();
    $profil = $model->listing();

    $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                    'deskripsi' => $site->namaweb.' - '.$site->tagline,
                    'keywords'  => $site->namaweb.' - '.$site->tagline,
                    'slider'    => $slider,
                    'site'		=> $site,
                    'profils'	=> $profil,
                    'content'   => 'profil/index'
                );
    return view('layout/wrapper',$data);
}

// kontak
public function read($slug_profil)
{
    $site   = DB::table('konfigurasi')->first();
    $slider = DB::table('galeri')->where('jenis_galeri','Profilpage')->orderBy('id_galeri', 'DESC')->first();
    // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    $model  = new Profil_model();
    $profil = $model->read($slug_profil);

    $data = array(  'title'     => $profil->judul_profil,
                    'deskripsi' => $profil->judul_profil,
                    'keywords'  => $profil->judul_profil,
                    'slider'    => $slider,
                    'site'      => $site,
                    'profil'    => $profil,
                    'content'   => 'profil/read'
                );
    return view('layout/wrapper',$data);
}
}
