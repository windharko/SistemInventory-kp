<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Route;

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

/*User route*/
Route::get('/', [LoginController::class, 'homeLogin'])->name('login');//show login page
Route::post('/login', [LoginController::class,'login']);//login access
Route::get('/register', [RegisterController::class, 'homeRegis']);//show register page
Route::post('/register',[RegisterController::class, 'register']);//register access
/*=======================================*/


Route::group(['middleware'=>['auth']], function(){
    /*main feature*/
    Route::get('/home', [BarangController::class, 'home'])->name('home');
    Route::get('/keluar', [KeluarController::class, 'getKeluar'])->name('keluar');
    Route::get('/barang', [BarangController::class, 'barang'])->name('barang');
    Route::get('/laporan', [LaporanController::class,'getLaporan'])->name('laporan');
    Route::get('/cariScan', [ScanController::class, 'cariScanItem'])->name('cariScan');
    /*=============================*/

    /*home page route*/
    Route::get('/cariStock', [BarangController::class,'cariStock'])->name('cariStock');
    /*=============================*/
    
    /*Cari Barang Route */
    Route::post('/cariScan',[ScanController::class, 'cariScan'])->name('postCariScan');
    /*==============================*/

    /*Barang Keluar Route*/
    Route::get('/cariKeluar', [KeluarController::class,'cariKeluar'])->name('cariKeluar');
    Route::get('/barangKeluar', [KeluarController::class, 'getKeluarBarang'])->name('keluarBarang');
    Route::post('/keluarBarang', [KeluarController::class, 'postKeluar'])->name('postKeluar');
    Route::get('/barangKembali/{id}', [BarangController::class, 'kembali'])->name('kembali');
    Route::post('/barangKembali/{id}', [BarangController::class, 'postKembali'])->name('postKembali');
    Route::get('/scan',[ScanController::class, 'scanner'])->name('scan');
    Route::post('/scan', [ScanController::class, 'scan'])->name('postscan');
    Route::post('/scanAgain', [ScanController::class, 'scanAgain'])->name('postscanAgain');
    Route::get('/saved', [KeluarController::class, 'saved'])->name('saved');
    Route::get('/saving', [KeluarController::class, 'saving'])->name('saving');
    Route::post('/firstSaved', [KeluarController::class, 'firstSaved'])->name('firstSaved');
    Route::post('/saveHapus/{id}', [KeluarController::class, 'hapus'])->name('saveHapus');
    /*==============================*/

    /*Barang Route*/
    Route::get('/cariBarang', [BarangController::class,'cariBarang'])->name('cariBarang');
    Route::post('updateBarang', [BarangController::class, 'updateBarang'])->name('updateBarang');
    Route::get('/updatebarang', [BarangController::class, 'viewBarang'])->name('updateBarang');
    Route::get('/update/{id}', [BarangController::class, 'update'])->name('update');
    Route::post('/barangUpdate/{id}', [BarangController::class, 'postUpdate'])->name('postUpdate');
    Route::get('/Hapus/{id}', [BarangController::class, 'hapus'])->name('hapus');
    Route::post('/barangHapus/{id}', [BarangController::class, 'postHapus'])->name('postHapus');
    Route::get('/Print/{id}', [BarangController::class, 'qrPrint'])->name('printQR');
    Route::get('/photo/{id}', [BarangController::class, 'photo'])->name('foto');
    /*=========================================*/
    
    /*Laporan Route*/
    Route::get('/laporanHistory', [LaporanController::class,'laporanHistory'])->name('laporanHistory');
    Route::get('/laporanKembali', [LaporanController::class,'laporanKembali'])->name('laporanKembali');
    Route::get('/laporanKeluar', [LaporanController::class,'laporanKeluar'])->name('laporanKeluar');
    Route::get('/history/{search_history?}',[PDFController::class, 'pdfhistory'])->name('pdfHistory');
    Route::get('/kembali/{search_kembali?}',[PDFController::class, 'pdfkembali'])->name('pdfKembali');
    Route::get('/Luar/{search_keluar?}',[PDFController::class, 'pdfluar'])->name('pdfKeluar');
    /*=============================================*/
    
    Route::get('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');

    
});