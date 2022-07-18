<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Produk_model;
use App\Rekening_model;
use App\Berita_model;
use App\Industri_model;
use App\Jurusan_model;
use App\Pemesanan_model;
use App\Prestasi_model;
use App\Profil_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Homepage')->limit(5)->orderBy('id_galeri', 'DESC')->get();
        $news   = new Berita_model();
        $berita = $news->home();
        $rewards = new Prestasi_model();
        $prestasi = $rewards->home();
        $jurus = new Jurusan_model();
        $jurusan = $jurus->home();
        $face  = new Profil_model();
        $profil = $face->home();
        $pabrik = new Industri_model();
        $industri = $pabrik->home();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'berita'    => $berita,
                        'prestasi'  => $prestasi,
                        'jurusan'  => $jurusan,
                        'profil'  => $profil,
                        'industri'  => $industri,
                        'content'   => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site   = DB::table('konfigurasi')->first();
        $data = array(  'title'     => 'Kontak Kami: '.$site->namaweb.' - '.$site->tagline,
                        'deskripsi' => 'Kontak '.$site->namaweb,
                        'keywords'  => 'Kontak '.$site->namaweb,
                        'site'      => $site,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

}