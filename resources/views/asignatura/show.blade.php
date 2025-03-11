@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Detalles de la Asignatura</h1>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="font-bold">Código:</label>
                    <p>{{ $asignatura->codigo }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Nombre:</label>
                    <p>{{ $asignatura->nombre }}</p>
                </div>

                <div class="mb-4 col-span-2">
                    <label class="font-bold">Descripción:</label>
                    <p>{{ $asignatura->descripcion }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Créditos:</label>
                    <p>{{ $asignatura->creditos }}</p>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-bold mb-4">Profesores que imparten la asignatura</h2>
                @if($asignatura->profesores->count() > 0)
                    <ul class="list-disc list-inside">
                        @foreach($asignatura->profesores as $profesor)
                            <li>{{ $profesor->nombre }} {{ $profesor->apellido }} - {{ $profesor->especialidad }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">No hay profesores asignados a esta asignatura.</p>
                @endif
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-bold mb-4">Alumnos matriculados</h2>
                @if($asignatura->alumnos->count() > 0)
                    <div class="bg-white rounded shadow">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 text-left">Nombre</th>
                                    <th class="py-2 px-4 text-left">Apellido</th>
                                    <th class="py-2 px-4 text-left">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asignatura->alumnos as $alumno)
                                    <tr class="border-t">
                                        <td class="py-2 px-4">{{ $alumno->nombre }}</td>
                                        <td class="py-2 px-4">{{ $alumno->apellido }}</td>
                                        <td class="py-2 px-4">{{ $alumno->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">No hay alumnos matriculados en esta asignatura.</p>
                @endif
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('asignaturas.edit', $asignatura) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>

                <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignatura?')">
                        Eliminar
                    </button>
                </form>

                <a href="{{ route('asignaturas.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
@endsection