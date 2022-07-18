<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Industri_model extends Model
{
    //
    protected $table 		= "industri";
    protected $primaryKey 	= 'id_industri';

    // listing
    public function semua()
    {
        $query = DB::table('industri')
            ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('industri')
            ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where('industri.id_user',$id_user)
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('industri')
            ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where('industri.judul_industri', 'LIKE', "%{$keywords}%") 
            ->orWhere('industri.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori($id_kategoriindustri)
    {
        $query = DB::table('industri')
            ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where(array(  'industri.id_kategoriindustri'    => $id_kategoriindustri))
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_industri($status_industri)
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where(array(  'industri.status_industri'         => $status_industri))
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function jenis_industri($jenis_industri)
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where(array(  'industri.jenis_industri'         => $jenis_industri))
            ->orderBy('id_industri','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where('industri.status_industri','Publish')
            ->orderBy('id_industri','ASC')
            ->paginate(10);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->orderBy('id_industri','ASC')
            ->limit(3)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_industri)
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where('industri.slug_industri',$slug_industri)
            ->orderBy('id_industri','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_industri)
    {
        $query = DB::table('industri')
             ->join('kategoriindustri', 'kategoriindustri.id_kategoriindustri', '=', 'industri.id_kategoriindustri','LEFT')
            ->join('users', 'users.id_user', '=', 'industri.id_user','LEFT')
            ->select('industri.*', 'kategoriindustri.slug_kindustri', 'kategoriindustri.nama_kindustri','users.nama')
            ->where('industri.id_industri',$id_industri)
            ->orderBy('id_industri','DESC')
            ->first();
        return $query;
    }
}
