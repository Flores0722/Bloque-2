<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    //endpoint get 
    public function index(){
        return view('libros.index') ; 
    }

    public function store(Request $request){
        $request->validate([
            'Name_Book' => 'required|string|max:200',
            'Name_Author'=> 'required|string|min:2|max:200',
            'year_Publication'=>'required|digits:4'.date('Y'),
            'description_of_the_book'=> 'text|max:500',
        ]);
        Libro::create($request->all());
        return redirect()->back()->with('success','Libro registrado correctamente');
    
    }
}

