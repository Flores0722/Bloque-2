<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibroController extends Controller
{
    //endpoint get 
    public function index(){
        $libros = Libro::all();
        return response()->json($libros);
    }
 
    public function store(Request $request){
        $validated = $request->validate([
            'Name_Book' => 'required|string|max:200',
            'Name_Author'=> 'required|string|min:2|max:200',
            'year_Publication'=> 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'description_of_the_book'=> 'string|max:500',
        ]);
        $libro = Libro::create($validated);
        return response()->json([
            'message' => 'Libro registrado correctamente',
            'libro' => $libro
        ], 201);
         // return redirect()->back()->with('success','Libro registrado correctamente');
    }
}

