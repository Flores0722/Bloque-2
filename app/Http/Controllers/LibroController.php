<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibroController extends Controller
{
    // Mestra el formulario para ingresar el libro
    public function create()
    {
        return view('libros.create');
    }

    // Ejecuta la consulta a la base de datos de los libros guardados
    public function index()
    {
        $libros = Libro::all();
        
        
        if (request()->expectsJson()) {
            return response()->json($libros);
        }
        
        
        return view('libros.index', compact('libros'));
    }
 
        // Guarda la infomracion que se recoge en el formulario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name_Book' => 'required|string|max:200',
            'Name_Author' => 'required|string|min:2|max:200',
            'year_Publication' => 'required|digits:4|integer|min:1100|max:' . date('Y'),
            'description_of_the_book' => 'nullable|string|max:500',
        ]);
        
        $libro = Libro::create($validated);
        
        
        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Libro registrado correctamente',
                'libro' => $libro
            ], 201);
        }
        
       
        return redirect()->route('libros.create')->with('success', 'Libro registrado correctamente');
    }
}

