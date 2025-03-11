<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::with(['profesores', 'alumnos'])->get();
        return view('asignatura.index', compact('asignaturas'));
    }

    public function create()
    {
        $profesores = Profesor::all();
        $alumnos = Alumno::all();
        return view('asignatura.create', compact('profesores', 'alumnos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:10|unique:asignaturas',
            'descripcion' => 'required|string',
            'creditos' => 'required|integer|min:1|max:20',
            'alumnos' => 'array',
            'alumnos.*' => 'exists:alumnos,id'
        ]);

        $asignatura = Asignatura::create($validatedData);

        if ($request->has('alumnos')) {
            $asignatura->alumnos()->attach($request->alumnos);
        }

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura creada con éxito');
    }

    public function show(Asignatura $asignatura)
    {
        $asignatura->load(['profesores', 'alumnos']);
        return view('asignatura.show', compact('asignatura'));
    }

    public function edit(Asignatura $asignatura)
    {
        $profesores = Profesor::all();
        $alumnos = Alumno::all();
        return view('asignatura.edit', compact('asignatura', 'profesores', 'alumnos'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:10|unique:asignaturas,codigo,' . $asignatura->id,
            'descripcion' => 'required|string',
            'creditos' => 'required|integer|min:1|max:20',
            'alumnos' => 'array',
            'alumnos.*' => 'exists:alumnos,id'
        ]);

        $asignatura->update($validatedData);

        if ($request->has('alumnos')) {
            $asignatura->alumnos()->sync($request->alumnos);
        }

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura actualizada con éxito');
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->alumnos()->detach();
        $asignatura->delete();
        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura eliminada con éxito');
    }

    public function asignarAlumnos(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'alumnos' => 'required|array',
            'alumnos.*' => 'exists:alumnos,id'
        ]);

        $asignatura->alumnos()->sync($request->alumnos);

        return redirect()->route('asignaturas.show', $asignatura)
            ->with('success', 'Alumnos asignados con éxito');
    }
}