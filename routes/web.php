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

Route::get('kelola/admin/form',[AdminController::class, 'create'])->name('kelola.admin');
Route::post('kelola/admin/form',[AdminController::class, 'store'])->name('kelola.admin.store');