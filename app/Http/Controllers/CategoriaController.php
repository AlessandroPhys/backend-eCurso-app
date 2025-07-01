<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Lista todas las categorías
    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    // Crea una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $category = Categoria::create($request->all());

        return response()->json($category, 201);
    }

    // Muestra una categoría específica
    public function show($id)
    {
        $category = Categoria::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($category, 200);
    }

    // Actualiza una categoría
    public function update(Request $request, $id)
    {
        $category = Categoria::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return response()->json($category, 200);
    }

    // Elimina una categoría
    public function destroy($id)
    {
        $category = Categoria::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Categoría eliminada'], 200);
    }
}
