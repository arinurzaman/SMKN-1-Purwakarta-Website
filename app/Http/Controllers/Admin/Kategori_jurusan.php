<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_jurusan extends Controller
{
     // Index
     public function index()
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         $kategorijurusan 	= DB::table('kategorijurusan')->orderBy('urutan','ASC')->get();
 
         $data = array(  'title'             => 'Kategori jurusan',
                         'kategorijurusan'	=> $kategorijurusan,
                         'content'           => 'admin/kategorijurusan/index'
                     );
         return view('admin/layout/wrapper',$data);
     }
 
     // tambah
     public function tambah(Request $request)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         request()->validate([
                             'nama_kjurusan' => 'required|unique:kategorijurusan',
                             'urutan' 		=> 'required',
                             ]);
         $slug_kjurusan = str_slug($request->nama_kjurusan, '-');
         DB::table('kategorijurusan')->insert([
             'nama_kjurusan' => $request->nama_kjurusan,
             'slug_kjurusan'	=> $slug_kjurusan,
             'urutan'   		=> $request->urutan
         ]);
         return redirect('admin/kategorijurusan')->with(['sukses' => 'Data telah ditambah']);
     }
 
     // edit
     public function edit(Request $request)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         request()->validate([
                             'nama_kjurusan' => 'required',
                             'urutan' 		=> 'required',
                             ]);
         $slug_kjurusan = str_slug($request->nama_kjurusan, '-');
         DB::table('kategorijurusan')->where('id_kategorijurusan',$request->id_kategorijurusan)->update([
             'nama_kjurusan' => $request->nama_kjurusan,
             'slug_kjurusan'	=> $slug_kjurusan,
             'urutan'   		=> $request->urutan
         ]);
         return redirect('admin/kategorijurusan')->with(['sukses' => 'Data telah diupdate']);
     }
 
     // Delete
     public function delete($id_kategorijurusan)
     {
         if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
         DB::table('kategorijurusan')->where('id_kategorijurusan',$id_kategorijurusan)->delete();
         return redirect('admin/kategorijurusan')->with(['sukses' => 'Data telah dihapus']);
     }
}
