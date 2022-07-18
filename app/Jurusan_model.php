<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Jurusan_model extends Model
{
    //
    protected $table 		= "jurusan";
    protected $primaryKey 	= 'id_jurusan';

    // listing
    public function semua()
    {
        $query = DB::table('jurusan')
            ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('jurusan')
            ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where('jurusan.id_user',$id_user)
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('jurusan')
            ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where('jurusan.judul_jurusan', 'LIKE', "%{$keywords}%") 
            ->orWhere('jurusan.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori($id_kategorijurusan)
    {
        $query = DB::table('jurusan')
            ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where(array(  'jurusan.id_kategorijurusan'    => $id_kategorijurusan))
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_jurusan($status_jurusan)
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where(array(  'jurusan.status_jurusan'         => $status_jurusan))
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function jenis_jurusan($jenis_jurusan)
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where(array(  'jurusan.jenis_jurusan'         => $jenis_jurusan))
            ->orderBy('id_jurusan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where('jurusan.status_jurusan','Publish')
            ->orderBy('id_jurusan','ASC')
            ->paginate(10);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->orderBy('id_jurusan','ASC')
            ->limit(3)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_jurusan)
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where('jurusan.slug_jurusan',$slug_jurusan)
            ->orderBy('id_jurusan','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_jurusan)
    {
        $query = DB::table('jurusan')
             ->join('kategorijurusan', 'kategorijurusan.id_kategorijurusan', '=', 'jurusan.id_kategorijurusan','LEFT')
            ->join('users', 'users.id_user', '=', 'jurusan.id_user','LEFT')
            ->select('jurusan.*', 'kategorijurusan.slug_kjurusan', 'kategorijurusan.nama_kjurusan','users.nama')
            ->where('jurusan.id_jurusan',$id_jurusan)
            ->orderBy('id_jurusan','DESC')
            ->first();
        return $query;
    }
}
