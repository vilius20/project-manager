<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;

Route::get('/new-project', [ProjectController::class, 'create'])->name('newProject');
Route::get('/', [ProjectController::class, 'index'])->name('index');
Route::post('/new-project', [ProjectController::class, 'store']);

Route::post('/', [StudentController::class, 'store'])->name('newStudent');
Route::put('/assign-student/{id}/{group}', [StudentController::class, 'update']);
Route::post('/remove-student/{id}', [StudentController::class, 'destroy']);