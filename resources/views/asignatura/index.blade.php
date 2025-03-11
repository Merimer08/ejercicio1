@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Listado de Asignaturas</h1>
            <a href="{{ route('asignaturas.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Nueva Asignatura
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Código</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Créditos</th>
                        <th class="py-3 px-6 text-left">Profesores</th>
                        <th class="py-3 px-6 text-left">Alumnos</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($asignaturas as $asignatura)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $asignatura->codigo }}</td>
                            <td class="py-3 px-6 text-left">{{ $asignatura->nombre }}</td>
                            <td class="py-3 px-6 text-left">{{ $asignatura->creditos }}</td>
                            <td class="py-3 px-6 text-left">
                                {{ $asignatura->profesores->pluck('nombre')->implode(', ') }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $asignatura->alumnos->count() }} alumnos
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('asignaturas.show', $asignatura) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded mx-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('asignaturas.edit', $asignatura) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded mx-1">
                                        Editar
                                    </a>
                                    <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded mx-1"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta asignatura?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection