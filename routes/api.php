<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('set_curso', [\App\Http\Controllers\CursoController::class, 'store']);
Route::get('get_curso', [\App\Http\Controllers\CursoController::class, 'index']);
Route::get('get_curso/{curso}', [\App\Http\Controllers\CursoController::class, 'show']);
Route::put('update_curso/{curso}', [\App\Http\Controllers\CursoController::class, 'update']);
Route::delete('delete_curso/{curso}', [\App\Http\Controllers\CursoController::class, 'destroy']);

Route::post('set_evaluacion', [\App\Http\Controllers\EvaluacionController::class, 'store']);
Route::get('get_evaluacion', [\App\Http\Controllers\EvaluacionController::class, 'index']);
Route::get('get_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'show']);
Route::put('update_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'update']);
Route::delete('delete_evaluacion/{evaluacion}', [\App\Http\Controllers\EvaluacionController::class, 'destroy']);

