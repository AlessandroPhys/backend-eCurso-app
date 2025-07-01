<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CourseUserController;

Route::get('/profile', [UserController::class, 'profile']);
Route::post('/logout', [UserController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('get_users', [UserController::class, 'index']);
    Route::get('get_users/{id}', [UserController::class, 'show']);




    Route::apiResource('categories', CategoriaController::class);
    Route::apiResource('courses', CursoController::class);

    ## Rutas para asignar cursos a usuarios
    Route::post('/courses/{id}/assign-user', [CourseUserController::class, 'assignUser']);

    Route::post('set_evaluacion', [\App\Http\Controllers\EvaluacionController::class, 'store']);
    Route::get('get_evaluacion', [\App\Http\Controllers\EvaluacionController::class, 'index']);
    Route::get('get_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'show']);
    Route::put('update_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'update']);
    Route::delete('delete_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'destroy']);
});
