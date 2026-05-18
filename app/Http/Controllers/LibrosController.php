<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\Libro;     

class LibrosController extends Controller
{
    public function create()
    {
        $categorias = Category::all();  
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:libros',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Libro::create($request->all());

        return redirect()->route('home')->with('success', 'Libro creado exitosamente.');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Category::all();  // ← cambia a $categories
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:libros,isbn,' . $libro->id,
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $libro->update($request->all());

        return redirect()->route('home')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('home')->with('success', 'Libro eliminado exitosamente.');
    }
}