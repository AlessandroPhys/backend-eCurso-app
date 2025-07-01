<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;

class UserController extends Controller
{
    // Obtener los datos del usuario autenticado
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    // Mostrar todos los usuarios
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    // Mostrar un usuario por ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user, 200);
    }

    // Logout: eliminar el token actual
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente.']);
    }

    public function assignCourse(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $courseId = $request->input('course_id');

        // Verificamos que el curso exista
        $course = Curso::findOrFail($courseId);

        // Asignamos el curso al usuario sin duplicados
        $user->courses()->syncWithoutDetaching([$courseId]);

        return response()->json(['message' => 'Curso asignado correctamente']);
    }
}
