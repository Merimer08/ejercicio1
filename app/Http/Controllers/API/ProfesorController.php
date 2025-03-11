<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return response()->json([
            'success' => true,
            'data' => $profesores
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email',
            'especialidad' => 'required|string|max:255',
        ]);

        $profesor = Profesor::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Profesor creado con éxito',
            'data' => $profesor
        ], Response::HTTP_CREATED);
    }

    public function show(Profesor $profesor)
    {
        return response()->json([
            'success' => true,
            'data' => $profesor
        ]);
    }

    public function update(Request $request, Profesor $profesor)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email,' . $profesor->id,
            'especialidad' => 'required|string|max:255',
        ]);

        $profesor->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Profesor actualizado con éxito',
            'data' => $profesor
        ]);
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return response()->json([
            'success' => true,
            'message' => 'Profesor eliminado con éxito'
        ]);
    }
}