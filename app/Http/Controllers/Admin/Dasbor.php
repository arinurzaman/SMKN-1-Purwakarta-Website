<?php

namespace App\Http\Controllers\Admin;

use App\Berita_model;
use App\Http\Controllers\Controller;
use App\Industri_model;
use App\Jurusan_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Konfigurasi_model;
use Image;
use App\Pemesanan_model;
use App\Prestasi_model;
use App\Produk_model;
use PDF;

class Dasbor extends Controller
{


    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();
        
        $Jurusan  = Jurusan_model::all()->count();
        $Berita   = Berita_model::all()->count();
        $Prestasi = Prestasi_model::all()->count();
        $Industri = Industri_model::all()->count();

		$data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'Jurusan'=> $Jurusan,
                        'Berita'=> $Berita,
                        'Prestasi'=> $Prestasi,
                        'Industri'=> $Industri,
                        'content'   => 'admin/dasbor/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
