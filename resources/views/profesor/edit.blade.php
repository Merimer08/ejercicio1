<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                <h1 class="text-4xl text-green-700 mb-6">Editar Profesor</h1>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profesores.update', ['profesore' => $profesor->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                            Nombre
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror"
                            id="nombre" type="text" name="nombre" value="{{ old('nombre', $profesor->nombre) }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="apellido">
                            Apellido
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('apellido') border-red-500 @enderror"
                            id="apellido" type="text" name="apellido" value="{{ old('apellido', $profesor->apellido) }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                            id="email" type="email" name="email" value="{{ old('email', $profesor->email) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="especialidad">
                            Especialidad
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('especialidad') border-red-500 @enderror"
                            id="especialidad" type="text" name="especialidad"
                            value="{{ old('especialidad', $profesor->especialidad) }}" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                            Teléfono
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefono') border-red-500 @enderror"
                            id="telefono" type="text" name="telefono" value="{{ old('telefono', $profesor->telefono) }}"
                            required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline transition-colors duration-300"
                            type="submit">
                            Actualizar
                        </button>
                        <a href="{{ route('profesores.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline transition-colors duration-300">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>