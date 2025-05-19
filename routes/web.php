<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\PenilaianController;

Route::get('/', function () {
    return view('public.dashboard');
})->name('dashboard');

Route::get('form/komplain',[KomplainController::class, 'index'])->name('komplain.form');
Route::get('form/saran',[SaranController::class, 'index'])->name('saran.form');
ROute::get('/lacak/komplain',[KomplainController::class, 'viewTrackStatus'])->name('lacak.komplain');
Route::get('lacak/komplain/{tiket}', [KomplainController::class, 'trackStatus'])->name('lacak.komplain.submit');

Route::get('/penilaian/{tiket}', [PenilaianController::class, 'index'])->name('penilaian.form');
Route::post('/penilaian/{tiket}',[PenilaianController::class, 'store'])->name('penilaian.submit');

// Route::middleware('auth')->group(function (){
Route::get('/laporan/pdf', [ExportController::class, 'generatePdf'])->name('komplain.');
Route::post('/laporan/excel',[ExportController::class, 'generateExcel'])->name('komplain.xlsx');
// });