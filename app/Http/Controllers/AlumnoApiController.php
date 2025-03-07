<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="API para consultar alumnos",
 *     version="1.0",
 *     description="API para interactuar con la base de datos de alumnos.",
 *     @OA\Contact(
 *         email="mariamalospelos@gmail.com"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 */
class AlumnoApiController extends Controller
{
    /**
     * Mostrar lista de alumnos.
     *
     * @OA\Get(
     *     path="/api/alumnos",
     *     summary="Obtener lista de alumnos",
     *     @OA\Response(response=200, description="Lista de alumnos obtenida correctamente")
     * )
     */
    public function index()
    {
        //
    }

    /**
     * Crear un nuevo alumno.
     *
     * @OA\Post(
     *     path="/api/alumnos",
     *     summary="Crear un nuevo alumno",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nombre", type="string", example="Juan Pérez"),
     *             @OA\Property(property="edad", type="integer", example=20)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Alumno creado correctamente"),
     *     @OA\Response(response=400, description="Error en la solicitud")
     * )
     */
    public function store(Request $request)
    {
        $datos = $request->input("data.attributes");
        $alumno = new Alumno($datos);
        $alumno->save();
        return new AlumnoResource($alumno);
    }

    /**
     * Mostrar un alumno específico.
     *
     * @OA\Get(
     *     path="/api/alumnos/{id}",
     *     summary="Obtener un alumno por ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Alumno obtenido correctamente"),
     *     @OA\Respons
