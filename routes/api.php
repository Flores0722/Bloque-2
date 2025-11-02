<?php

use App\Http\Controllers\LibroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user',[LibroController::class,'index']);

Route::post('/user',[LibroController::class,'index']);
      
