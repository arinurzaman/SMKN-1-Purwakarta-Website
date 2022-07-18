<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Kategori_profil extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategoriprofil 	= DB::table('kategoriprofil')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Profil',
						'kategoriprofil'	=> $kategoriprofil,
                        'content'           => 'admin/kategoriprofil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_profil' => 'required|unique:kategoriprofil',
					        'urutan' 		=> 'required',
					        ]);
    	$slug_profil = str_slug($request->nama_profil, '-');
        DB::table('kategoriprofil')->insert([
            'nama_profil' => $request->nama_profil,
            'slug_profil'	=> $slug_profil,
            'urutan'   		=> $request->urutan
        ]);
        return redirect('admin/kategoriprofil')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_profil' => 'required',
					        'urutan' 		=> 'required',
					        ]);
    	$slug_profil = str_slug($request->nama_profil, '-');
        DB::table('kategoriprofil')->where('id_kategoriprofil',$request->id_kategoriprofil)->update([
            'nama_profil' => $request->nama_profil,
            'slug_profil'	=> $slug_profil,
            'urutan'   		=> $request->urutan
        ]);
        return redirect('admin/kategoriprofil')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategoriprofil)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategoriprofil')->where('id_kategoriprofil',$id_kategoriprofil)->delete();
    	return redirect('admin/kategoriprofil')->with(['sukses' => 'Data telah dihapus']);
    }
}
