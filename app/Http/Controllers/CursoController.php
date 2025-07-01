<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return Curso::with('category', 'creator')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $course = Curso::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'created_by' => auth()->id(), // Assuming the user is authenticated
        ]);

        return response()->json($course, 201);
    }

    public function show($id)
    {
        return Curso::with('category', 'creator')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Curso::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $course->update($request->only('title', 'description', 'category_id'));

        return response()->json($course);
    }

    public function destroy($id)
    {
        $course = Curso::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Curso eliminado.']);
    }
}
