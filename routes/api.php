<?php

use App\Http\Controllers\LibroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/libros/index',[LibroController::class,'index'])->name('libros.index');

Route::post('/libros',[LibroController::class,'store'])->name('libros.store');
Route::get('/libros',[LibroController::class,'store'])->name('libros.store');     
