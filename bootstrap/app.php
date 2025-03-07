<?php

use App\Http\Requests\StoreAlumnoRequest;
use GuzzleHttp\Psr7\Query;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SetHeaderMiddleware;
use App\Http\Middleware\ValidateHeaderMiddleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(ValidateHeaderMiddleware::class);
        $middleware->api(SetHeaderMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(fn (QueryException $e) => errorQueryException($e));
        $exceptions->render(fn (ValidationException $e) => errorValidationData($e));
    })
    ->create();

function errorQueryException(QueryException $e)
{
    return response()->json([
        'errors' => [
            'status' => '500',
            'title' => 'Error en la base de datos: ' . $e->getMessage(),
            'detail' => 'La base de datos no responde, intente de nuevo.',
        ],
    ], 500);
}

function errorValidationData(ValidationException $e)
{
    return response()->json([
        'errors' => [
            'status' => '422',
            'title' => 'Error en la validación de datos: ' . key($e->errors()),
            'detail' => $e->errors(),
        ],
    ], 422);
}

class AlumnoController
{
    public function store(StoreAlumnoRequest $request)
    {
        $datos = $request->input("data.attributes");
        $alumno = new Alumno($datos);
        $alumno->save();
        return new AlumnoResource($alumno);
    }

    public function show(string $id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json([
                'errors' => [
                    'status' => '404',
                    'title' => 'Alumno no encontrado',
                    'detail' => 'El alumno con el ID proporcionado no existe.',
                ],
            ], 404);
        }
        return new AlumnoResource($alumno);
    }
}