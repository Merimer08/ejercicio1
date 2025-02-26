<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view("alumno.index", ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("alumno.create"); //Retorrna la vista del formulario
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required |string | max:255', /* requiered es un campo obligatorio */
            'apellido' => 'required |string | max:255',
            'email' => 'required |email | unique:alumnos',
            'telefono' => 'nullable |string | max:255',
        ]);
        // Crear un nuevo alumno
    Alumno::create($request->all());

    // Redirigir con mensaje de éxito
    return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
