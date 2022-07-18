<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Profil_model extends Model
{
 //
 protected $table 		= "profil";
 protected $primaryKey 	= 'id_profil';

 // listing
 public function semua()
 {
     $query = DB::table('profil')
         ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // author
 public function author($id_user)
 {
     $query = DB::table('profil')
         ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where('profil.id_user',$id_user)
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // listing
 public function cari($keywords)
 {
     $query = DB::table('profil')
         ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where('profil.judul_profil', 'LIKE', "%{$keywords}%") 
         ->orWhere('profil.isi', 'LIKE', "%{$keywords}%") 
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // kategori
 public function all_kategori($id_kategoriprofil)
 {
     $query = DB::table('profil')
         ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where(array(  'profil.id_kategoriprofil'    => $id_kategoriprofil))
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // kategori
 public function status_profil($status_profil)
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where(array(  'profil.status_profil'         => $status_profil))
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // kategori
 public function jenis_profil($jenis_profil)
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where(array(  'profil.jenis_profil'         => $jenis_profil))
         ->orderBy('id_profil','DESC')
         ->get();
     return $query;
 }

 // listing
 public function listing()
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where('profil.status_profil','Publish')
         ->orderBy('id_profil','ASC')
         ->paginate(10);
     return $query;
 }

 // listing
 public function home()
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->orderBy('id_profil','DESC')
         ->limit(3)
         ->get();
     return $query;
 }

 // detail
 public function read($slug_profil)
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where('profil.slug_profil',$slug_profil)
         ->orderBy('id_profil','DESC')
         ->first();
     return $query;
 }

  // detail
 public function detail($id_profil)
 {
     $query = DB::table('profil')
          ->join('kategoriprofil', 'kategoriprofil.id_kategoriprofil', '=', 'profil.id_kategoriprofil','LEFT')
         ->join('users', 'users.id_user', '=', 'profil.id_user','LEFT')
         ->select('profil.*', 'kategoriprofil.slug_kprofil', 'kategoriprofil.nama_kprofil','users.nama')
         ->where('profil.id_profil',$id_profil)
         ->orderBy('id_profil','DESC')
         ->first();
     return $query;
 }}
