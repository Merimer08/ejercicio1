<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de alumnos</h1>
        
        <div class="w-full max-w-4xl overflow-y-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg"> <!-- table pin rowsas genera el deslizar pero nose donde -->
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Apellido</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-center ">
                            <a href="{{ route('alumnos.create') }}" class="btn bg-orange-500 text-white">Nuevo Alumno</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $alumno->nombre }}</td>
                            <td class="py-2 px-4">{{ $alumno->apellido }}</td>
                            <td class="py-2 px-4">{{ $alumno->email }}</td>
                            <td class="py-2 px-4">{{ $alumno->telefono }}</td>
                            <td class="py-2 px-4 text-right">
    <!-- Botón para Editar -->
    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-sm bg-green-500 text-white rounded-lg hover:bg-green-300 px-4 py-2 mr-2 transition-colors duration-300">Editar</a>
    
    <!-- Botón para Eliminar -->
    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm bg-red-500 text-white rounded-lg hover:bg-red-300 px-4 py-2 transition-colors duration-300">Eliminar</button>
    </form>
</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>
