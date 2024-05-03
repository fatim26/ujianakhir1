<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ContakController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DatapenjualanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProduktitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Sabberworm\CSS\Property\Import;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/',[HomeController::class,'index']);
route::resource('/jenis',JenisController::class);
route::resource('/menu',MenuController::class);
route::resource('/pelanggan',PelangganController::class);
route::resource('/pemesanan',PemesananController::class);
route::resource('/transaksi',TransaksiController::class);
Route::get('nota/{faktur}', [TransaksiController::class, 'faktur']);
route::resource('/stok',StokController::class);
route::resource('/pelanggan',PelangganController::class);
route::resource('/kategori',KategoriController::class);
route::resource('/meja',MejaController::class);







route::get('export/menu',[MenuController::class,'exportData'])->name('export-menu');
route::get('export/jenis',[JenisController::class,'exportData'])->name('export-jenis');
route::get('export/karyawan',[KaryawanController::class,'exportData'])->name('export-karyawan');
route::get('export/meja',[MejaController::class,'exportData'])->name('export-meja');
route::get('export/kategori',[KategoriController::class,'exportData'])->name('export-kategori');
route::get('export/stok',[StokController::class,'exportData'])->name('export-stok');
route::get('export/pelanggan',[PelangganController::class,'exportData'])->name('export-pelanggan');
route::get('export/produktitipan',[ProduktitipanController::class,'exportData'])->name('export-produktitipan');
route::get('export/absensi',[AbsensiController::class,'exportData'])->name('export-absensi');



route::post('menu/import',[MenuController::class,'ImportData'])->name('menu-import');
route::post('jenis/import',[JenisController::class,'ImportData'])->name('import-jenis');
route::post('kategori/import',[KategoriController::class,'ImportData'])->name('import-kategori');
route::post('meja/import',[MejaController::class,'ImportData'])->name('import-meja');
route::post('stok/import',[StokController::class,'ImportData'])->name('stok-import');


route::get('generate/absensi',[AbsensiController::class, 'absensipdf'])->name('absensi-pdf');
route::get('generate/jenis',[JenisController::class, 'jenispdf'])->name('jenis-pdf');
route::get('generate/karyawan',[KaryawanController::class, 'karyawanpdf'])->name('karyawan-pdf');
route::get('generate/menu',[MenuController::class, 'menupdf'])->name('menu-pdf');
route::get('generate/meja',[MejaController::class, 'mejapdf'])->name('meja-pdf');
route::get('generate/stok',[StokController::class, 'stokpdf'])->name('stok-pdf');
route::get('generate/kategori',[kategoriController::class, 'kategoripdf'])->name('kategori-pdf');
route::get('generate/pelanggan',[PelangganController::class, 'pelangganpdf'])->name('pelanggan-pdf');
route::get('generate/produktitipan',[ProduktitipanController::class, 'produktitipanpdf'])->name('produktitipan-pdf');

route::get('/login',[UserController::class,'index'])->name('login');
route::post('/login/cek',[UserController::class,'cekLogin'])->name('cekLogin');
route::get('/logout',[UserController::class, 'logout'])->name('logout');


Route::post('/contact', 'ContactController@mail')->name('contact.mail');
route::get('/dashboar',[DataController::class,'index']);
route::get('contak',[ContakController::class,'index']);
