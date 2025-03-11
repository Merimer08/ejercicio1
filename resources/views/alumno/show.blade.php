@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Detalles del Alumno</h1>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="font-bold">Nombre:</label>
                    <p>{{ $alumno->nombre }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Apellido:</label>
                    <p>{{ $alumno->apellido }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Email:</label>
                    <p>{{ $alumno->email }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Edad:</label>
                    <p>{{ $alumno->edad }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Dirección:</label>
                    <p>{{ $alumno->direccion }}</p>
                </div>
            </div>

            <!-- Sección de Asignaturas -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Asignaturas Matriculadas</h2>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Profesor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumno->asignaturas as $asignatura)
                                <tr>
                                    <td>
                                        <a href="{{ route('asignaturas.show', $asignatura) }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            {{ $asignatura->nombre }}
                                        </a>
                                    </td>
                                    <td>{{ $asignatura->descripcion }}</td>
                                    <td>{{ $asignatura->profesor->nombre }} {{ $asignatura->profesor->apellido }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('alumnos.edit', $alumno) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>

                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este alumno?')">
                        Eliminar
                    </button>
                </form>

                <a href="{{ route('alumnos.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
@endsection