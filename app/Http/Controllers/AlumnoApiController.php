<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Resources\AlumnoCollection;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use Illuminate\Http\Request;
use function Pest\Laravel\json;
/**
 * @OA\Info(
 *      title="API para consultar alumnos de mi centro",
 *      version="2.0.0",
 *      description="Esta api permite interactuar con los alumnos de bd del instituto",
 *      @OA\Contact(
 *          name="Maria",
 *          email="mariacasas@gmail.com",
 *      ),
 *      @OA\License(
 *          name="MIT",
 *          url="https://opensource.org/license/mit",
 *      )
 * )
 */
class AlumnoApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/alumnos",
     *      operationId="getAllStudents",
     *      tags={"Alumnos"},
     *      summary="Obtener todos los alumnos",
     *      @OA\Response(
     *          response=200,
     *          description="Éxito",
     *      )
     * )
     */
    public function index(Request $request)
    {
        return new AlumnoCollection(Alumno::all());
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $datos = $request->input("data.attributes");
        $alumno = new Alumno($datos);
        $alumno->save();
        return new AlumnoResource($alumno);
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}






