<?php

use App\Http\Controllers\LibroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('')->group(function () {
    Route::apiResource('libros', LibroController::class);
});