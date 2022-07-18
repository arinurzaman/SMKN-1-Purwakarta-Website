<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_prestasi extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategoriprestasi 	= DB::table('kategoriprestasi')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Prestasi',
						'kategoriprestasi'	=> $kategoriprestasi,
                        'content'           => 'admin/kategoriprestasi/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_prestasi' => 'required|unique:kategoriprestasi',
					        'urutan' 		=> 'required',
					        ]);
    	$slug_prestasi = str_slug($request->nama_prestasi, '-');
        DB::table('kategoriprestasi')->insert([
            'nama_prestasi' => $request->nama_prestasi,
            'slug_prestasi'	=> $slug_prestasi,
            'urutan'   		=> $request->urutan
        ]);
        return redirect('admin/kategoriprestasi')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_prestasi' => 'required',
					        'urutan' 		=> 'required',
					        ]);
    	$slug_prestasi = str_slug($request->nama_prestasi, '-');
        DB::table('kategoriprestasi')->where('id_kategoriprestasi',$request->id_kategoriprestasi)->update([
            'nama_prestasi' => $request->nama_prestasi,
            'slug_prestasi'	=> $slug_prestasi,
            'urutan'   		=> $request->urutan
        ]);
        return redirect('admin/kategoriprestasi')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategoriprestasi)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategoriprestasi')->where('id_kategoriprestasi',$id_kategoriprestasi)->delete();
    	return redirect('admin/kategoriprestasi')->with(['sukses' => 'Data telah dihapus']);
    }
}
