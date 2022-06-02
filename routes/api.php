<?php

use App\Http\Controllers\Api\ApiProjectController;
use App\Http\Controllers\Api\ApiStudentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/projects', [ApiProjectController::class, 'index']);
    Route::get('/projects/{id}', [ApiProjectController::class, 'show']);
    Route::post('/projects', [ApiProjectController::class, 'store']);
    Route::delete('/projects/{id}', [ApiProjectController::class, 'destroy']);
    Route::get('/projects/search/{title}', [ApiProjectController::class, 'search']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::post('/students', [ApiStudentController::class, 'store']);
    Route::put('/students', [ApiStudentController::class, 'update']);
    Route::delete('/students/{id}', [ApiStudentController::class, 'destroy']);
});