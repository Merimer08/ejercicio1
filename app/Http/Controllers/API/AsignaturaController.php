<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponses;
use Exception;

class AsignaturaController extends Controller
{
    use ApiResponses;

    public function index()
    {
        try {
            $asignaturas = Asignatura::with(['profesor', 'alumnos'])->get();
            return $this->successResponse($asignaturas);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'profesor_id' => 'required|exists:profesores,id',
                'max_alumnos' => 'required|integer|min:1',
            ]);

            $asignatura = Asignatura::create($validatedData);
            return $this->successResponse($asignatura, 'Asignatura creada con éxito', Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show(Asignatura $asignatura)
    {
        try {
            $asignatura->load(['profesor', 'alumnos']);
            return $this->successResponse($asignatura);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'profesor_id' => 'required|exists:profesores,id',
                'max_alumnos' => 'required|integer|min:1',
            ]);

            $asignatura->update($validatedData);
            return $this->successResponse($asignatura, 'Asignatura actualizada con éxito');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function destroy(Asignatura $asignatura)
    {
        try {
            $asignatura->delete();
            return $this->successResponse(null, 'Asignatura eliminada con éxito');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function addAlumno(Request $request, Asignatura $asignatura)
    {
        try {
            $request->validate([
                'alumno_id' => 'required|exists:alumnos,id'
            ]);

            if ($asignatura->alumnos->count() >= $asignatura->max_alumnos) {
                return $this->errorResponse('La asignatura ha alcanzado el máximo de alumnos permitidos');
            }

            $alumno = Alumno::find($request->alumno_id);

            if ($asignatura->alumnos->contains($alumno)) {
                return $this->errorResponse('El alumno ya está inscrito en esta asignatura');
            }

            $asignatura->alumnos()->attach($alumno);
            return $this->successResponse($alumno, 'Alumno añadido a la asignatura con éxito');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function removeAlumno(Asignatura $asignatura, Alumno $alumno)
    {
        try {
            if (!$asignatura->alumnos->contains($alumno)) {
                return $this->errorResponse('El alumno no está inscrito en esta asignatura');
            }

            $asignatura->alumnos()->detach($alumno);
            return $this->successResponse(null, 'Alumno eliminado de la asignatura con éxito');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}