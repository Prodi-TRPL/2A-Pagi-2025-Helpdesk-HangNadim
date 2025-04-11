<?php

use Illuminate\Support\Facades\Route;use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/student', [StudentController::class, 'index'])
    ->name('student.index');
=======

Route::get('/student', [StudentController::class, 'index'])
    ->name('student.index');

Route::get('/student/add', [StudentController::class, 'create'])
    ->name('student.create');

Route::POST('/student/add', [StudentController::class, 'store'])
    ->name('student.store');
>>>>>>> 1cf4486c563a90f9eb8e3262616cae50f0765e63
