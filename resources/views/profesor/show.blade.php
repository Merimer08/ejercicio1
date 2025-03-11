@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6">Detalles del Profesor</h1>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="font-bold">Nombre:</label>
                    <p>{{ $profesor->nombre }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Apellido:</label>
                    <p>{{ $profesor->apellido }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Email:</label>
                    <p>{{ $profesor->email }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Especialidad:</label>
                    <p>{{ $profesor->especialidad }}</p>
                </div>

                <div class="mb-4">
                    <label class="font-bold">Teléfono:</label>
                    <p>{{ $profesor->telefono }}</p>
                </div>
            </div>

            <!-- Sección de Signatura -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Signatura Digital</h2>
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        @if($profesor->signatura)
                            <div class="flex items-center gap-4">
                                @if($profesor->signatura->imagen_firma)
                                    <img src="{{ asset('storage/' . $profesor->signatura->imagen_firma) }}" alt="Firma digital"
                                        class="max-w-xs">
                                @endif
                                <p class="text-gray-600">{{ $profesor->signatura->descripcion ?? 'Sin descripción' }}</p>
                            </div>
                        @else
                            <p class="text-gray-600">Este profesor aún no tiene una signatura digital registrada.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sección de Asignaturas -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Asignaturas que Imparte</h2>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Alumnos Inscritos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profesor->asignaturas as $asignatura)
                                <tr>
                                    <td>
                                        <a href="{{ route('asignaturas.show', $asignatura) }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            {{ $asignatura->nombre }}
                                        </a>
                                    </td>
                                    <td>{{ $asignatura->descripcion }}</td>
                                    <td>{{ $asignatura->alumnos->count() }}/{{ $asignatura->max_alumnos }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('profesores.edit', $profesor) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>

                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">
                        Eliminar
                    </button>
                </form>

                <a href="{{ route('profesores.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
@endsection