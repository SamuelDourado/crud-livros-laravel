<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('livros', \App\Http\Controllers\API\LivrosController::class);

Route::get('relatorio', [\App\Http\Controllers\LivroRelatorioController::class, 'export']);
