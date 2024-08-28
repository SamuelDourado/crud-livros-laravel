<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

// Route::apiResource();

Route::get('livros', [\App\Http\Controllers\API\LivrosController::class, 'index']);
