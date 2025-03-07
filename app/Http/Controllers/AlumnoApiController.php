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
     *     path="
