<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesor.index', ['profesores' => $profesores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfesorRequest $request)
    {
        $validatedData = $request->validated();

        $profesor = Profesor::create($validatedData);

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesor $profesor)
    {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesorRequest $request, Profesor $profesor)
    {
        $validatedData = $request->validated();

        $profesor->update($validatedData);

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return redirect()->route('profesores.index')
            ->with('success', 'Profesor eliminado con éxito');
    }
}
