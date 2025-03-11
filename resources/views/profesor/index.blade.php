<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de Profesores</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="w-full max-w-7xl overflow-y-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Apellido</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Especialidad</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $profesor->nombre }}</td>
                            <td class="py-2 px-4">{{ $profesor->apellido }}</td>
                            <td class="py-2 px-4">{{ $profesor->email }}</td>
                            <td class="py-2 px-4">{{ $profesor->especialidad }}</td>
                            <td class="py-2 px-4">{{ $profesor->telefono }}</td>
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('profesores.edit', $profesor) }}"
                                    class="btn btn-sm bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 px-6 py-2 mr-2 transition-colors duration-300">Editar</a>

                                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST"
                                    id="formulario{{$profesor->id}}" class="inline-block" onsubmit="event.preventDefault()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm bg-red-500 text-white rounded-lg hover:bg-red-600 px-6 py-2 transition-colors duration-300"
                                        onclick="confirmDelete({{ $profesor->id }}, '{{ $profesor->nombre }}')">
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
                text: "¿Estás seguro de borrar el profesor " + nombre + " ?",
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