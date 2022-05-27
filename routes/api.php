<?php

use App\Http\Controllers\Api\ApiProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ApiProjectController::class, 'index']);
Route::post('/projects', [ApiProjectController::class, 'store']);
Route::post('/projects/search/{title}', [ApiProjectController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});