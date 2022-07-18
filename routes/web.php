<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END */
// Home
Route::get('/', 'Home@index');
Route::get('home', 'Home@index');
Route::get('kontak', 'Home@kontak');
// Login
Route::get('login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('login/lupa', 'Login@lupa');
Route::get('login/logout', 'Login@logout');
// Berita
Route::get('berita', 'Berita@index');
Route::get('berita/read/{par1}', 'Berita@read');
// Prestasi
Route::get('prestasi', 'Prestasi@index');
Route::get('prestasi/read/{par1}', 'Prestasi@read');
// Jurusan
Route::get('jurusan', 'Jurusan@index');
Route::get('jurusan/read/{par1}', 'Jurusan@read');
// Industri
Route::get('industri', 'Industri@index');
Route::get('industri/read/{par1}', 'Industri@read');
// Profil
Route::get('profil', 'Profil@index');
Route::get('profil/read/{par1}', 'Profil@read');
// download
Route::get('download', 'Download@index');
Route::get('download/unduh/{par1}', 'Download@unduh');
// galeri
Route::get('galeri', 'Galeri@index');
Route::get('galeri/detail/{par1}', 'Galeri@detail');
// video
Route::get('video', 'Video@index');
Route::get('video/detail/{par1}', 'Video@detail');
// Produk
Route::get('produk', 'Produk@index');
Route::get('produk/kategori/{par1}', 'Produk@kategori');
Route::get('produk/detail/{par1}', 'Produk@detail');
Route::get('produk/cetak/{par1}', 'Produk@cetak');
/* END FRONT END */
/* BACK END */
Route::group(['namespace' => 'Admin'], 
function()
{
	// dasbor
    Route::get('admin/dasbor', 'Dasbor@index');
    // Route::get('admin/dasbor', 'Dasbor@index');
    Route::get('admin/dasbor/konfigurasi', 'Dasbor@konfigurasi');
    // user
    Route::get('admin/user', 'User@index');
    Route::post('admin/user/tambah', 'User@tambah');
    Route::get('admin/user/edit/{par1}', 'User@edit');
    Route::post('admin/user/proses_edit', 'User@proses_edit');
    Route::get('admin/user/delete/{par1}', 'User@delete');
    Route::post('admin/user/proses', 'User@proses');
    // konfigurasi
    Route::get('admin/konfigurasi', 'Konfigurasi@index');
    Route::get('admin/konfigurasi/logo', 'Konfigurasi@logo');
    Route::get('admin/konfigurasi/icon', 'Konfigurasi@icon');
    Route::get('admin/konfigurasi/email', 'Konfigurasi@email');
    Route::get('admin/konfigurasi/gambar', 'Konfigurasi@gambar');
    Route::get('admin/konfigurasi/pembayaran', 'Konfigurasi@pembayaran');
    Route::post('admin/konfigurasi/proses', 'Konfigurasi@proses');
    Route::post('admin/konfigurasi/proses_logo', 'Konfigurasi@proses_logo');
    Route::post('admin/konfigurasi/proses_icon', 'Konfigurasi@proses_icon');
    Route::post('admin/konfigurasi/proses_email', 'Konfigurasi@proses_email');
    Route::post('admin/konfigurasi/proses_gambar', 'Konfigurasi@proses_gambar');
    Route::post('admin/konfigurasi/proses_pembayaran', 'Konfigurasi@proses_pembayaran');
    // berita
    Route::get('admin/berita', 'Berita@index');
    Route::get('admin/berita/cari', 'Berita@cari');
    Route::get('admin/berita/status_berita/{par1}', 'Berita@status_berita');
    Route::get('admin/berita/kategori/{par1}', 'Berita@kategori');
    Route::get('admin/berita/jenis_berita/{par1}', 'Berita@jenis_berita');
    Route::get('admin/berita/author/{par1}', 'Berita@author');
    Route::get('admin/berita/tambah', 'Berita@tambah');
    Route::get('admin/berita/edit/{par1}', 'Berita@edit');
    Route::get('admin/berita/delete/{par1}', 'Berita@delete');
    Route::post('admin/berita/tambah_proses', 'Berita@tambah_proses');
    Route::post('admin/berita/edit_proses', 'Berita@edit_proses');
    Route::post('admin/berita/proses', 'Berita@proses');
    // prestasi
    Route::get('admin/prestasi', 'Prestasi@index');
    Route::get('admin/prestasi/cari', 'Prestasi@cari');
    Route::get('admin/prestasi/status_berita/{par1}', 'Prestasi@status_prestasi');
    Route::get('admin/prestasi/kategori/{par1}', 'Prestasi@kategori');
    Route::get('admin/prestasi/jenis_berita/{par1}', 'Prestasi@jenis_prestasi');
    Route::get('admin/prestasi/author/{par1}', 'Prestasi@author');
    Route::get('admin/prestasi/tambah', 'Prestasi@tambah');
    Route::get('admin/prestasi/edit/{par1}', 'Prestasi@edit');
    Route::get('admin/prestasi/delete/{par1}', 'Prestasi@delete');
    Route::post('admin/prestasi/tambah_proses', 'Prestasi@tambah_proses');
    Route::post('admin/prestasi/edit_proses', 'Prestasi@edit_proses');
    Route::post('admin/prestasi/proses', 'Prestasi@proses');
     // jurusan
     Route::get('admin/jurusan', 'Jurusan@index');
     Route::get('admin/jurusan/cari', 'Jurusan@cari');
     Route::get('admin/jurusan/status_jurusan/{par1}', 'Jurusan@status_jurusan');
     Route::get('admin/jurusan/kategori/{par1}', 'Jurusan@kategori');
     Route::get('admin/jurusan/jenis_jurusan/{par1}', 'Jurusan@jenis_jurusan');
     Route::get('admin/jurusan/author/{par1}', 'Jurusan@author');
     Route::get('admin/jurusan/tambah', 'Jurusan@tambah');
     Route::get('admin/jurusan/edit/{par1}', 'Jurusan@edit');
     Route::get('admin/jurusan/delete/{par1}', 'Jurusan@delete');
     Route::post('admin/jurusan/tambah_proses', 'Jurusan@tambah_proses');
     Route::post('admin/jurusan/edit_proses', 'Jurusan@edit_proses');
     Route::post('admin/jurusan/proses', 'Jurusan@proses');
     // profil
     Route::get('admin/profil', 'Profil@index');
     Route::get('admin/profil/cari', 'Profil@cari');
     Route::get('admin/profil/status_profil/{par1}', 'Profil@status_profil');
     Route::get('admin/profil/kategori/{par1}', 'Profil@kategori');
     Route::get('admin/profil/jenis_profil/{par1}', 'Profil@jenis_profil');
     Route::get('admin/profil/author/{par1}', 'Profil@author');
     Route::get('admin/profil/tambah', 'Profil@tambah');
     Route::get('admin/profil/edit/{par1}', 'Profil@edit');
     Route::get('admin/profil/delete/{par1}', 'Profil@delete');
     Route::post('admin/profil/tambah_proses', 'Profil@tambah_proses');
     Route::post('admin/profil/edit_proses', 'Profil@edit_proses');
     Route::post('admin/profil/proses', 'Profil@proses');
     // industri
     Route::get('admin/industri', 'Industri@index');
     Route::get('admin/industri/cari', 'Industri@cari');
     Route::get('admin/industri/status_industri/{par1}', 'Industri@status_industri');
     Route::get('admin/industri/kategori/{par1}', 'Industri@kategori');
     Route::get('admin/industri/jenis_industri/{par1}', 'Industri@jenis_industri');
     Route::get('admin/industri/author/{par1}', 'Industri@author');
     Route::get('admin/industri/tambah', 'Industri@tambah');
     Route::get('admin/industri/edit/{par1}', 'Industri@edit');
     Route::get('admin/industri/delete/{par1}', 'Industri@delete');
     Route::post('admin/industri/tambah_proses', 'Industri@tambah_proses');
     Route::post('admin/industri/edit_proses', 'Industri@edit_proses');
     Route::post('admin/industri/proses', 'Industri@proses');
    // kategori
    Route::get('admin/kategori', 'Kategori@index');
    Route::post('admin/kategori/tambah', 'Kategori@tambah');
    Route::post('admin/kategori/edit', 'Kategori@edit');
    Route::get('admin/kategori/delete/{par1}', 'Kategori@delete');
    // kategoriprestasi
    Route::get('admin/kategoriprestasi', 'Kategori_prestasi@index');
    Route::post('admin/kategoriprestasi/tambah', 'Kategori_prestasi@tambah');
    Route::post('admin/kategoriprestasi/edit', 'Kategori_prestasi@edit');
    Route::get('admin/kategoriprestasi/delete/{par1}', 'Kategori_prestasi@delete');
    // kategorijurusan
    Route::get('admin/kategorijurusan', 'Kategori_jurusan@index');
    Route::post('admin/kategorijurusan/tambah', 'Kategori_jurusan@tambah');
    Route::post('admin/kategorijurusan/edit', 'Kategori_jurusan@edit');
    Route::get('admin/kategorijurusan/delete/{par1}', 'Kategori_jurusan@delete');
    // kategoriprofil
    Route::get('admin/kategoriprofil', 'Kategori_profil@index');
    Route::post('admin/kategoriprofil/tambah', 'Kategori_profil@tambah');
    Route::post('admin/kategoriprofil/edit', 'Kategori_profil@edit');
    Route::get('admin/kategoriprofil/delete/{par1}', 'Kategori_profil@delete');
    // kategoriindustri
    Route::get('admin/kategoriindustri', 'Kategori_industri@index');
    Route::post('admin/kategoriindustri/tambah', 'Kategori_industri@tambah');
    Route::post('admin/kategoriindustri/edit', 'Kategori_industri@edit');
    Route::get('admin/kategoriindustri/delete/{par1}', 'Kategori_industri@delete');
    // video
    Route::get('admin/video', 'Video@index');
    Route::get('admin/video/edit/{par1}', 'Video@edit');
    Route::post('admin/video/tambah', 'Video@tambah');
    Route::post('admin/video/proses_edit', 'Video@proses_edit');
    Route::get('admin/video/delete/{par1}', 'Video@delete');
    Route::post('admin/video/proses', 'Video@proses');
    // kategori_produk
    Route::get('admin/kategori_produk', 'Kategori_produk@index');
    Route::post('admin/kategori_produk/tambah', 'Kategori_produk@tambah');
    Route::post('admin/kategori_produk/edit', 'Kategori_produk@edit');
    Route::get('admin/kategori_produk/delete/{par1}', 'Kategori_produk@delete');
    // kategori_download
    Route::get('admin/kategori_download', 'Kategori_download@index');
    Route::post('admin/kategori_download/tambah', 'Kategori_download@tambah');
    Route::post('admin/kategori_download/edit', 'Kategori_download@edit');
    Route::get('admin/kategori_download/delete/{par1}', 'Kategori_download@delete');
    // kategori_galeri
    Route::get('admin/kategori_galeri', 'Kategori_galeri@index');
    Route::post('admin/kategori_galeri/tambah', 'Kategori_galeri@tambah');
    Route::post('admin/kategori_galeri/edit', 'Kategori_galeri@edit');
    Route::get('admin/kategori_galeri/delete/{par1}', 'Kategori_galeri@delete');
    // galeri
    Route::get('admin/galeri', 'Galeri@index');
    Route::get('admin/galeri/cari', 'Galeri@cari');
    Route::get('admin/galeri/status_galeri/{par1}', 'Galeri@status_galeri');
    Route::get('admin/galeri/kategori/{par1}', 'Galeri@kategori');
    Route::get('admin/galeri/tambah', 'Galeri@tambah');
    Route::get('admin/galeri/edit/{par1}', 'Galeri@edit');
    Route::get('admin/galeri/delete/{par1}', 'Galeri@delete');
    Route::post('admin/galeri/tambah_proses', 'Galeri@tambah_proses');
    Route::post('admin/galeri/edit_proses', 'Galeri@edit_proses');
    Route::post('admin/galeri/proses', 'Galeri@proses');
    // download
    Route::get('admin/download', 'Download@index');
    Route::get('admin/download/cari', 'Download@cari');
    Route::get('admin/download/status_download/{par1}', 'Download@status_download');
    Route::get('admin/download/kategori/{par1}', 'Download@kategori');
    Route::get('admin/download/tambah', 'Download@tambah');
    Route::get('admin/download/edit/{par1}', 'Download@edit');
    Route::get('admin/download/unduh/{par1}', 'Download@unduh');
    Route::get('admin/download/delete/{par1}', 'Download@delete');
    Route::post('admin/download/tambah_proses', 'Download@tambah_proses');
    Route::post('admin/download/edit_proses', 'Download@edit_proses');
    Route::post('admin/download/proses', 'Download@proses');
});
/* END BACK END*/



