<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index'])
     ->name('student.index');
 
 Route::get('/student/add', [StudentController::class, 'create'])
     ->name('student.create');
 
 Route::POST('/student/add', [StudentController::class, 'store'])
     ->name('student.store');

Route::get('/student/edit/{id}', [StudentController::class, 'edit'])
    ->name('student.edit');

Route::put('/student/edit/{id}', [StudentController::class, 'update'])
    ->name('student.update');