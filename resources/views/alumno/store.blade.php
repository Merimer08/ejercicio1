<x-layouts.layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Alumno</h1>

        <!-- Formulario para crear un nuevo alumno -->
        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf  <!-- Protege contra CSRF -->

            <!-- Campo para el nombre -->
            <div class="mb-4">
                <label class="label" for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="input input-bordered w-full" required>
            </div>

            <!-- Campo para el apellido -->
            <div class="mb-4">
                <label class="label" for="apellido">Apellido</label>AlumnoApiControllerstore
                <input type="text" name="apellido" id="apellido" class="input input-bordered w-full" required>
            </div>

            <!-- Campo para el email -->
            <div class="mb-4">
                <label class="label" for="email">Email</label>
                <input type="email" name="email" id="email" class="input input-bordered w-full" required>
            </div>

            <!-- Campo para el teléfono -->
            <div class="mb-4">
                <label class="label" for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="input input-bordered w-full">
            </div>

            <!-- Botón para guardar el alumno -->
            <button type="submit" class="btn bg-green-600 text-white w-full">Guardar Alumno</button>
        </form>
    </div>
</x-layouts.layout>
