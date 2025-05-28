<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\PenilaianController;


Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('statistik', function () {
    return view('admin.statistik');
})->name('statsitik');

Route::get('pelapor', function () {
    return view('admin.data_pelapor');
})->name('data_pelapor');

Route::get('sidebar', function () {
    return view('partials.sidebar');
})->name('sidebar');

Route::get('komplain', function () {
    return view('admin.komplain');
});

Route::get('form/komplain',[KomplainController::class, 'index'])->name('komplain.form');
Route::get('form/saran',[SaranController::class, 'index'])->name('saran.form');
ROute::get('lacak/komplain',[KomplainController::class, 'viewTrackStatus'])->name('lacak.komplain');
Route::get('lacak/komplain/{tiket}', [KomplainController::class, 'trackStatus'])->name('lacak.komplain.submit');

Route::get('penilaian/{tiket}', [PenilaianController::class, 'index'])->name('penilaian.form');
Route::post('penilaian/{tiket}',[PenilaianController::class, 'store'])->name('penilaian.submit');

// Route::middleware('auth')->group(function (){
Route::post('laporan/pdf', [ExportController::class, 'generatePdf'])->name('komplain.pdf');
Route::post('laporan/excel',[ExportController::class, 'generateExcel'])->name('komplain.xlsx');
// });
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('auth');

<<<<<<< HEAD
Route::get('kelola/admin/form',[AdminController::class, 'create'])->name('kelola.admin');
Route::post('kelola/admin/form',[AdminController::class, 'store'])->name('kelola.admin.store');
=======
Route::get('kelola/admin',[AdminController::class, 'create'])->name('kelola.admin');
<<<<<<< HEAD
Route::post('kelola/admin',[AdminController::class, 'store'])->name('kelola.admin.store');
Route::get('kelola/admin',[AdminController::class, 'create'])->name('kelola_admin');
Route::post('kelola/admin',[AdminController::class, 'store'])->name('kelola_admin_store');
=======
Route::post('kelola/admin',[AdminController::class, 'store'])->name('kelola.admin.store');
>>>>>>> 7295a5eace2af4f33607a71a054e72e71ec8f019
>>>>>>> 576e38c515887cb65fd255f1cbd2473976ce54d4
