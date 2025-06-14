<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PenilaianController;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('statistik', function () {
    return view('admin.statistik');
})->name('statistik');

Route::get('penilaian', function () {
    return view('admin.penilaian');
})->name('penilaian');



Route::get('sidebar', function () {
    return view('partials.sidebar');
})->name('sidebar');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('auth');

Route::get('form/komplain',[KomplainController::class, 'create'])->name('komplain.form');
Route::get('form/saran',[SaranController::class, 'create'])->name('saran.form');

Route::get('lacak/komplain',[KomplainController::class, 'viewTrackComplaint'])->name('lacak.komplain');
Route::get('lacak/komplain/t', [KomplainController::class, 'trackComplaint'])->name('lacak.komplain.submit');

Route::get('penilaian/{tiket}', [PenilaianController::class, 'index'])->name('penilaian.form');
Route::post('penilaian/{tiket}',[PenilaianController::class, 'store'])->name('penilaian.submit');

Route::middleware('auth')->group(function (){

    Route::post('laporan/pdf', [ExportController::class, 'generatePdf'])->name('komplain.pdf');
    Route::post('laporan/excel',[ExportController::class, 'generateExcel'])->name('komplain.xlsx');

    Route::get('pelapor', [PelaporController::class, 'index'] )->name('data.pelapor');
    
    Route::get('kelola/admin', [AdminController::class, 'index'])->name('kelola.admin');
    Route::delete('kelola/admin/{user}', [AdminController::class, 'destroy'])->name('kelola.admin.destroy');
    Route::get('kelola/admin/form',[AdminController::class, 'create'])->name('kelola.admin.form');
    Route::post('kelola/admin/form',[AdminController::class, 'store'])->name('kelola.admin.store');
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('saran',[SaranController::class, 'index'])->name('saran');
    
    Route::get('komplain', [KomplainController::class, 'index'])->name('komplain');
    Route::patch('komplain/update-tingkat-status/{komplain}', [KomplainController::class, 'updateStatusTingkat'])->name('update.status.tingkat');
    Route::get('komplain/update/{komplain}', [KomplainController::class, 'edit'])->name('komplain.edit');
    Route::put('komplain/update/k{komplain}', [KomplainController::class, 'update'])->name('komplain.update');
});
