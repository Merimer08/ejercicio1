<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('asignatura')->get();
        return view('profesores', ['profesores' => $profesores]);
    }
}
