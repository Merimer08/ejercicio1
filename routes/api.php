<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AlumnoController;
use App\Http\Controllers\API\ProfesorController;
use App\Http\Controllers\API\AsignaturaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas API para Alumnos
Route::prefix('v1')->group(function () {
    // Alumnos
    Route::get('/alumnos', [AlumnoController::class, 'index']);
    Route::post('/alumnos', [AlumnoController::class, 'store']);
    Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show']);
    Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy']);

    // Profesores
    Route::get('/profesores', [ProfesorController::class, 'index']);
    Route::post('/profesores', [ProfesorController::class, 'store']);
    Route::get('/profesores/{profesor}', [ProfesorController::class, 'show']);
    Route::put('/profesores/{profesor}', [ProfesorController::class, 'update']);
    Route::delete('/profesores/{profesor}', [ProfesorController::class, 'destroy']);

    // Asignaturas
    Route::get('/asignaturas', [AsignaturaController::class, 'index']);
    Route::post('/asignaturas', [AsignaturaController::class, 'store']);
    Route::get('/asignaturas/{asignatura}', [AsignaturaController::class, 'show']);
    Route::put('/asignaturas/{asignatura}', [AsignaturaController::class, 'update']);
    Route::delete('/asignaturas/{asignatura}', [AsignaturaController::class, 'destroy']);

    // Rutas específicas para la gestión de alumnos en asignaturas
    Route::post('/asignaturas/{asignatura}/alumnos', [AsignaturaController::class, 'addAlumno']);
    Route::delete('/asignaturas/{asignatura}/alumnos/{alumno}', [AsignaturaController::class, 'removeAlumno']);
});