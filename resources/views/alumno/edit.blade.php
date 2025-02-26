<!-- resources/views/alumno/editar.blade.php -->
<x-layouts.layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Editar Alumno</h1>

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="label">Nombre</label>
                <input type="text" name="nombre" class="input input-bordered w-full" value="{{ old('nombre', $alumno->nombre) }}" required>
            </div>

            <div class="mb-4">
                <label class="label">Apellido</label>
                <input type="text" name="apellido" class="input input-bordered w-full" value="{{ old('apellido', $alumno->apellido) }}" required>
            </div>

            <div class="mb-4">
                <label class="label">Email</label>
                <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email', $alumno->email) }}" required>
            </div>

            <div class="mb-4">
                <label class="label">Teléfono</label>
                <input type="text" name="telefono" class="input input-bordered w-full" value="{{ old('telefono', $alumno->telefono) }}">
            </div>

            <div class="mb-4">
                <label class="label">Edad</label>
                <input type="number" name="edad" class="input input-bordered w-full" value="{{ old('edad', $alumno->edad) }}" required>
            </div>

            <div class="mb-4">
                <label class="label">Dirección</label>
                <input type="text" name="direccion" class="input input-bordered w-full" value="{{ old('direccion', $alumno->direccion) }}" required>
            </div>

            <button type="submit" class="btn bg-green-600 text-white w-full">Actualizar Alumno</button>
        </form>
    </div>
</x-layouts.layout>
