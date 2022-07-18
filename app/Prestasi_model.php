<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Prestasi_model extends Model
{
     //
     protected $table 		= "prestasi";
     protected $primaryKey 	= 'id_prestasi';
 
     // listing
     public function semua()
     {
         $query = DB::table('prestasi')
             ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // author
     public function author($id_user)
     {
         $query = DB::table('prestasi')
             ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where('prestasi.id_user',$id_user)
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // listing
     public function cari($keywords)
     {
         $query = DB::table('prestasi')
             ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where('prestasi.judul_prestasi', 'LIKE', "%{$keywords}%") 
             ->orWhere('prestasi.isi', 'LIKE', "%{$keywords}%") 
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // kategori
     public function all_kategori($id_kategoriprestasi)
     {
         $query = DB::table('prestasi')
             ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where(array(  'prestasi.id_kategoriprestasi'    => $id_kategoriprestasi))
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // kategori
     public function status_prestasi($status_prestasi)
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where(array(  'prestasi.status_prestasi'         => $status_prestasi))
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // kategori
     public function jenis_prestasi($jenis_prestasi)
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where(array(  'prestasi.jenis_prestasi'         => $jenis_prestasi))
             ->orderBy('id_prestasi','DESC')
             ->get();
         return $query;
     }
 
     // listing
     public function listing()
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where('prestasi.status_prestasi','Publish')
             ->orderBy('id_prestasi','DESC')
             ->paginate(10);
         return $query;
     }
 
     // listing
     public function home()
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->orderBy('id_prestasi','DESC')
             ->limit(3)
             ->get();
         return $query;
     }
 
     // detail
     public function read($slug_prestasi)
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where('prestasi.slug_prestasi',$slug_prestasi)
             ->orderBy('id_prestasi','DESC')
             ->first();
         return $query;
     }
 
      // detail
     public function detail($id_prestasi)
     {
         $query = DB::table('prestasi')
              ->join('kategoriprestasi', 'kategoriprestasi.id_kategoriprestasi', '=', 'prestasi.id_kategoriprestasi','LEFT')
             ->join('users', 'users.id_user', '=', 'prestasi.id_user','LEFT')
             ->select('prestasi.*', 'kategoriprestasi.slug_kprestasi', 'kategoriprestasi.nama_kprestasi','users.nama')
             ->where('prestasi.id_prestasi',$id_prestasi)
             ->orderBy('id_prestasi','DESC')
             ->first();
         return $query;
     }
}
