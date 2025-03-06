<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use Illuminate\Http\Request;

use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all()/* ->sortBy('apellido') */;
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
     */public function store(StoreAlumnoRequest $request) /* store alumno reqyuest */
{
    // validad
    //regoger los datos MANUEL
    
    $datos = $request -> input ();/* esto es laravel */
    
    $alumno = new alumno ($datos);
    $alumno->save();
    return redirect(route("alumnos.index"))->with('success', 'Alumno creado con éxito');
    // $nombre= &POST['nombre']

    //guardar en la bd
 /*     $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|email|unique:alumnos,email',
        'telefono' => 'nullable|string|max:15', // Permitir que teléfono sea nulo o un valor válido
        
        'edad' => 'required|integer|min:1', // Validación de edad'=> ',
        'direccion' => 'required|string|max:255', // Validación de dirección
    
    ]);

    Alumno::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'edad' => $request->edad, // Aquí se guarda el valor de la edad
        'direccion' => $request->direccion,  // Aquí se guarda el valor de la dirección
   
   
    ]);

    return redirect()->route('alumnos.index')->with('success', 'Alumno creado con éxito');
*/
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
        
        return view("alumno.edit", ["alumno" => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        session()->flash("status","Se ha actualizado $alumno->nombre");
        return redirect(route("alumnos.index"))->with('success', 'Alumno actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash("status","Se ha borrado $alumno->nombre");
        return redirect(route("alumnos.index"));

    }
}
