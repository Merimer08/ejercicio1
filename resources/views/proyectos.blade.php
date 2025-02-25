<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de Proyectos</h1>
        
        <div class="w-full max-w-4xl">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Descripcion</th>
                        <th class="py-3 px-4 text-left">Duración</th>
                        <th class="py-3 px-4 text-left">Complejidad</th>
                        <th class="py-3 px-4 text-left">Profesor</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos  as $proyecto)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $proyecto->nombre }}</td>
                            <td class="py-2 px-4">{{ $proyecto->descripcion }}</td>
                            <td class="py-2 px-4">{{ $proyecto->horas }}</td>
                            <td class="py-2 px-4">{{ $proyecto->complejidad }}</td>
                            <td class="py-2 px-4">{{ $proyecto->profesor->nombre }} {{ $proyecto->profesor->apellido }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>