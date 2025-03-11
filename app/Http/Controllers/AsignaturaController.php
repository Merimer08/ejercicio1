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
        $asignaturas = Asignatura::with(['profesor', 'alumnos'])->get();
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
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'profesor_id' => 'required|exists:profesores,id',
            'alumnos' => 'array|max:15'
        ]);

        $asignatura = Asignatura::create($request->all());

        if ($request->has('alumnos')) {
            $asignatura->alumnos()->attach($request->alumnos);
        }

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura creada exitosamente.');
    }

    public function show(Asignatura $asignatura)
    {
        // Obtener los alumnos que no están en esta asignatura
        $alumnosDisponibles = Alumno::whereNotIn('id', $asignatura->alumnos->pluck('id'))->get();
        return view('asignatura.show', compact('asignatura', 'alumnosDisponibles'));
    }

    public function edit(Asignatura $asignatura)
    {
        $profesores = Profesor::all();
        $alumnos = Alumno::all();
        return view('asignatura.edit', compact('asignatura', 'profesores', 'alumnos'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'profesor_id' => 'required|exists:profesores,id',
            'alumnos' => 'array|max:15'
        ]);

        $asignatura->update($request->all());

        if ($request->has('alumnos')) {
            $asignatura->alumnos()->sync($request->alumnos);
        }

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura actualizada exitosamente.');
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura eliminada exitosamente.');
    }

    public function addAlumno(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id'
        ]);

        if ($asignatura->alumnos->count() >= $asignatura->max_alumnos) {
            return back()->with('error', 'La asignatura ya ha alcanzado el máximo de alumnos permitidos.');
        }

        $asignatura->alumnos()->attach($request->alumno_id);
        return back()->with('success', 'Alumno añadido exitosamente.');
    }

    public function removeAlumno(Asignatura $asignatura, Alumno $alumno)
    {
        $asignatura->alumnos()->detach($alumno->id);
        return back()->with('success', 'Alumno eliminado de la asignatura exitosamente.');
    }
}