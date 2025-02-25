<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name("main");

Route::get('/dashboard', function () {
    return view('main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view("About", "about")->name("about");
Route::view("noticias", "noticias")->name("noticias");
Route::get('Alumnos', [\App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos');
Route::get("Profesores", [\App\Http\Controllers\ProfesorController::class, 'index'])->name("profesores");
Route::get("Proyectos", [\App\Http\Controllers\ProyectoController::class, 'index'])->name("proyectos");
Route::view("Contacto", "contacto")->name("contacto");
require __DIR__.'/auth.php';