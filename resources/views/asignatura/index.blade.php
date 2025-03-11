<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de Asignaturas</h1>

        <div class="w-full max-w-4xl overflow-y-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Descripción</th>
                        <th class="py-3 px-4 text-left">Profesor</th>
                        <th class="py-3 px-4 text-left">Alumnos</th>
                        <th class="py-3 px-4 text-center">
                            <a href="{{ route('asignaturas.create') }}"
                                class="btn bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 rounded-lg transition-colors duration-300">Nueva
                                Asignatura</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asignaturas as $asignatura)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $asignatura->nombre }}</td>
                            <td class="py-2 px-4">{{ $asignatura->descripcion }}</td>
                            <td class="py-2 px-4">{{ $asignatura->profesor->nombre }} {{ $asignatura->profesor->apellido }}
                            </td>
                            <td class="py-2 px-4">{{ $asignatura->alumnos->count() }}/{{ $asignatura->max_alumnos }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('asignaturas.show', $asignatura->id) }}"
                                    class="btn btn-sm bg-blue-500 text-white rounded-lg hover:bg-blue-300 px-4 py-2 mr-2 transition-colors duration-300">
                                    Ver
                                </a>

                                <form action="{{ route('asignaturas.destroy', $asignatura->id) }}" method="POST"
                                    id="formulario{{$asignatura->id}}" class="inline-block"
                                    onsubmit="event.preventDefault()">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm bg-red-500 text-white rounded-lg hover:bg-red-300 px-4 py-2 transition-colors duration-300"
                                        onclick="confirmDelete({{ $asignatura->id }}, '{{ $asignatura->nombre }}')">
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

    <script>
        function confirmDelete(id, nombre) {
            swal({
                title: "Confirmar Borrado",
                text: "¿Estás seguro de borrar la asignatura " + nombre + "?",
                icon: "warning",
                buttons: true
            }).then(function (ok) {
                if (ok) {
                    const formulario = document.getElementById("formulario" + id);
                    formulario.submit();
                }
            });
        }
    </script>
</x-layouts.layout>