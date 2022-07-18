<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_industri extends Controller
{
    public function index()
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         $kategoriindustri 	= DB::table('kategoriindustri')->orderBy('urutan','ASC')->get();
 
         $data = array(  'title'             => 'Kategori industri',
                         'kategoriindustri'	=> $kategoriindustri,
                         'content'           => 'admin/kategoriindustri/index'
                     );
         return view('admin/layout/wrapper',$data);
     }
 
     // tambah
     public function tambah(Request $request)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         request()->validate([
                             'nama_kindustri' => 'required|unique:kategoriindustri',
                             'urutan' 		=> 'required',
                             ]);
         $slug_kindustri = str_slug($request->nama_kindustri, '-');
         DB::table('kategoriindustri')->insert([
             'nama_kindustri' => $request->nama_kindustri,
             'slug_kindustri'	=> $slug_kindustri,
             'urutan'   		=> $request->urutan
         ]);
         return redirect('admin/kategoriindustri')->with(['sukses' => 'Data telah ditambah']);
     }
 
     // edit
     public function edit(Request $request)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         request()->validate([
                             'nama_kindustri' => 'required',
                             'urutan' 		=> 'required',
                             ]);
         $slug_kindustri = str_slug($request->nama_kindustri, '-');
         DB::table('kategoriindustri')->where('id_kategoriindustri',$request->id_kategoriindustri)->update([
             'nama_kindustri' => $request->nama_kindustri,
             'slug_kindustri'	=> $slug_kindustri,
             'urutan'   		=> $request->urutan
         ]);
         return redirect('admin/kategoriindustri')->with(['sukses' => 'Data telah diupdate']);
     }
 
     // Delete
     public function delete($id_kategoriindustri)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         DB::table('kategoriindustri')->where('id_kategoriindustri',$id_kategoriindustri)->delete();
         return redirect('admin/kategoriindustri')->with(['sukses' => 'Data telah dihapus']);
     }
}
