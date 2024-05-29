<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin_poliController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\No_AntrianController;
use App\Http\Controllers\SocialliteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\login_registerController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\cetakController;
use App\Http\Middleware\UserMiddleware;

Route::get('/',[login_registerController::class, 'show_home'])->name('home');;


Route::get('/tentang', function () {
    return view('leanding-page.tentang');
})->name('tentang');
Route::get('/cara-menggunakan', function () {
    return view('leanding-page.cara-menggunakan');
})->name('cara-menggunakan');
Route::get('/lihat-antrian', function () {
    return view('leanding-page.lihat-antrian');
})->name('lihat-antrian');

Route::get('/cekkk', function () {
    return view('nota-no_antrian');
})->name('lihat-antrian');


Route::group(['middleware' => 'admin_pendaftaran'], function(){
    Route::get('/admin/dashboard',[AdminController::class,'show_dashboard'])->name('admin_dashboard');


Route::get('/admin/data_antrian',[AdminController::class,'show_dataAntrian'])->name('admin_datanoantrian');
Route::post('/admin/data_antrian/tambah',[No_AntrianController::class,'tambah_antrian'])->name('tambah_datanoantrian');


Route::get('/admin/permintaan_antrian',[AdminController::class,'show_permintaanAntrian'])->name('admin_permintaanAntrian');

Route::put('/admin/permintaan_antrian/edit_dokter/{id}',[PermintaanController::class,'edit_dokter'])->name('admin_permintaan_edit');

Route::get('/admin/antrian_berjalan',[AdminController::class,'show_AntrianBerjalan'])->name('admin_antrianBerjalan');

Route::get('/admin/data_dokter',[AdminController::class,'show_DataDokter'])->name('admin_DataDokter');
Route::post('/admin/data_dokter/tambah',[DokterController::class,'tambah_dokter'])->name('tambah_dokter');
Route::put('/admin/data_dokter/edit/{id}',[DokterController::class,'edit_dokter'])->name('edit_dokter');
Route::delete('/admin/data_dokter/delete/{id}',[DokterController::class,'delete_dokter'])->name('delete_dokter');

Route::get('/admin/data_pasien',[AdminController::class,'show_DataPasien'])->name('admin_DataPasien');
Route::post('/admin/data_pasien/tambah',[PasienController::class,'tambah_pasien'])->name('tambah_pasien');
Route::put('/admin/data_pasien/edit/{id}',[PasienController::class,'edit_pasien'])->name('edit_pasien');
Route::delete('/admin/data_pasien/delete/{id}',[PasienController::class,'delete_pasien'])->name('delete_pasien');

Route::get('/admin/laporan',[AdminController::class,'show_Laporan'])->name('admin_Laporan');

Route::put('/admin/cetakantrians/{id}',[cetakController::class, 'cetakantrians'])->name('cetaks');
Route::post('/admin/cetaklaporan',[cetakController::class, 'cetaklaporan'])->name('admin_cetaklaporan');

});






Route::get('/auth/redirect', [SocialliteController::class, 'redirect'])->name('redirect');
Route::get('/auth/google/callback', [SocialliteController::class, 'callback'])->name('redirect');

Route::post('/authentication',[login_registerController::class, 'login'])->name('login');
Route::get('/login',[login_registerController::class, 'show_login'])->name('sign-in');
Route::get('/register',[login_registerController::class, 'show_register'])->name('sign-up');
Route::post('/register',[login_registerController::class, 'register'])->name('register');
Route::get('/cetakantrian',[cetakController::class, 'cetakantrians'])->name('cetak');

Route::get('/cetaklaporans',function(){
    return view('cetak_laporan');
});

Route::get('/awal',[cetakController::class, 'index'])->name('index');

Route::group(['middleware' => 'pasien'], function(){

    Route::get('/user/no_antrian',[UserController::class,'show_antrian'])->name('user_antrians');
    Route::get('/user/no_antrianberjalan',[UserController::class,'show_antrianberjalan'])->name('user_antrianberjalan');
    Route::get('/user/riwayat_antrian',[UserController::class,'show_riwayatantrian'])->name('user_riwayatantrian');
    Route::get('/user/pasien',[UserController::class,'show_pasien'])->name('user_pasien');
    
    Route::put('/user/pasien/ambil_pasien/{id}',[UserController::class,'ambil_pasien'])->name('ambil_pasien');
    Route::put('/user/pasien/edit/{id}',[UserController::class,'edit_pasien'])->name('user_edit_pasien');
    Route::post('/user/pasien/tambah',[UserController::class,'tambah_pasien'])->name('user_tambah_pasien');

    Route::post('/user/no_antrian/tambah',[UserController::class,'tambah_antrian'])->name('user_tambah_antrian');
    Route::put('/cetakantrians/{id}',[cetakController::class, 'cetakantrians'])->name('cetaks');

});

Route::group(['middleware' => 'admin_poli'], function(){
    Route::get('/admin_poli/dashboard',[Admin_poliController::class,'show_dashboard'])->name('admin_poli_dashboard');

    Route::get('/admin_poli/poli_umum',[Admin_poliController::class,'show_antrianpoliumum'])->name('admin_poliumum_antrian');
    Route::get('/admin_poli/poli_gigi',[Admin_poliController::class,'show_antrianpoligigi'])->name('admin_poligigi_antrian');
    Route::get('/admin_poli/poli_kia',[Admin_poliController::class,'show_antrianpolikia'])->name('admin_polikia_antrian');

    Route::put('/admin_poli/edit/{id}',[Admin_poliController::class,'edit_antrian'])->name('admin_poli_editstatus');
    
});

Route::get('/admin/profile',[AdminController::class,'show_profile'])->name('admin_profile');
Route::put('/admin/profile/edit/{id}',[AdminController::class,'edit_profile'])->name('edit_profile');

Route::get('/logout',[login_registerController::class,'logout'])->name('logout');




