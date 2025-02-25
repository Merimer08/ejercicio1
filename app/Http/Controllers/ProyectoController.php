<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with('profesor')->get();
        return view('proyectos', ['proyectos' => $proyectos]);
    }
}
