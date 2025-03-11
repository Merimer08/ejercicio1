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