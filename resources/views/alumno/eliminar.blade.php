<!-- resources/views/alumno/eliminar.blade.php -->
<x-layouts.layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-red-600">Eliminar Alumno</h1>

        <p class="mb-4">¿Estás seguro de que deseas eliminar el alumno <strong>{{ $alumno->nombre }} {{ $alumno->apellido }}</strong>? Esta acción no se puede deshacer.</p>

        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn bg-red-600 text-white w-full">Eliminar Alumno</button>
            <a href="{{ route('alumnos.index') }}" class="btn bg-gray-400 text-white w-full mt-4">Cancelar</a>
        </form>
    </div>
</x-layouts.layout>
