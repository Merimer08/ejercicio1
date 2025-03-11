<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json([
            'success' => true,
            'data' => $alumnos
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'edad' => 'required|integer|min:1|max:120',
            'direccion' => 'required|string|max:255',
        ]);

        $alumno = Alumno::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Alumno creado con éxito',
            'data' => $alumno
        ], Response::HTTP_CREATED);
    }

    public function show(Alumno $alumno)
    {
        return response()->json([
            'success' => true,
            'data' => $alumno
        ]);
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
            'edad' => 'required|integer|min:1|max:120',
            'direccion' => 'required|string|max:255',
        ]);

        $alumno->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Alumno actualizado con éxito',
            'data' => $alumno
        ]);
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json([
            'success' => true,
            'message' => 'Alumno eliminado con éxito'
        ]);
    }
}