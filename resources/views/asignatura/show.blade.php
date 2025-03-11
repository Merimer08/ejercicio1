<x-layouts.layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="border-2 border-green-200 rounded-lg p-6 mb-6">
                <h1 class="text-2xl font-bold mb-4 text-green-600">{{ $asignatura->nombre }}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="font-bold text-orange-500">Descripción:</span>
                        <p class="text-gray-700">{{ $asignatura->descripcion }}</p>
                    </div>

                    <div>
                        <span class="font-bold text-orange-500">Profesor:</span>
                        <p class="text-gray-700">{{ $asignatura->profesor->nombre }}
                            {{ $asignatura->profesor->apellido }}
                        </p>
                    </div>

                    <div>
                        <span class="font-bold text-orange-500">Alumnos Inscritos:</span>
                        <p class="text-gray-700">{{ $asignatura->alumnos->count() }}/{{ $asignatura->max_alumnos }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('asignaturas.edit', $asignatura) }}"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-block transition-colors duration-300">
                        Editar Asignatura
                    </a>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-green-600">Lista de Alumnos</h2>
                    @if($asignatura->alumnos->count() < $asignatura->max_alumnos)
                        <button onclick="toggleModal()"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded inline-block transition-colors duration-300">
                            Añadir Alumno
                        </button>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border-2 border-green-200 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-green-100">
                                <th
                                    class="px-6 py-4 text-left text-sm font-bold text-green-600 uppercase tracking-wider border-b-2 border-green-200">
                                    Nombre</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-bold text-green-600 uppercase tracking-wider border-b-2 border-green-200">
                                    Email</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-bold text-green-600 uppercase tracking-wider border-b-2 border-green-200">
                                    Edad</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-bold text-green-600 uppercase tracking-wider border-b-2 border-green-200">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-green-200">
                            @foreach($asignatura->alumnos as $alumno)
                                <tr class="hover:bg-green-50 transition-colors duration-300">
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $alumno->nombre }} {{ $alumno->apellido }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $alumno->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $alumno->edad }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('asignaturas.alumnos.remove', [$asignatura, $alumno]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Estás seguro de querer eliminar este alumno de la asignatura?')"
                                                class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-2 rounded-lg transition-colors duration-300 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para añadir alumnos -->
    <div id="addAlumnoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-lg font-bold mb-4 text-green-600">Añadir Alumno a la Asignatura</h3>

            <form action="{{ route('asignaturas.alumnos.add', $asignatura) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Alumno:</label>
                    <select name="alumno_id" class="w-full border-2 border-green-200 rounded p-2">
                        @foreach($alumnosDisponibles as $alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="toggleModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                        Añadir
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('addAlumnoModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
</x-layouts.layout>