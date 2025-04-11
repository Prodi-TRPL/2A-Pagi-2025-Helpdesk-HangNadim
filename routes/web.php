<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/student', [StudentController::class, 'index'])
    ->name('student.index');

Route::get('/student/add', [StudentController::class, 'create'])
    ->name('student.create');

Route::POST('/student/add', [StudentController::class, 'store'])
    ->name('student.store');