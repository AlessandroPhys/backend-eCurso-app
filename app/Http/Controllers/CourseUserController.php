<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function assignUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->users()->attach($request->user_id);

        return response()->json(['message' => 'Usuario asignado al curso con éxito']);
    }
}
