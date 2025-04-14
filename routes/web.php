<?php

use Illuminate\Support\Facades\Route;use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/edit/{id}', [StudentController::class, 'edit'])
    ->name('student.edit');

Route::put('/student/edit/{id}', [StudentController::class, 'update'])
    ->name('student.update');