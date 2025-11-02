<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    //endpoint get 
    public function index(){
        return response()->json(['message'=>'Lista de Usurios']) ; 
    }

    public function store(){
        return response()->json(['message'=>'Crear  nuevo usuario']);

    
    }
}

