<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de profesores</h1>
        
        <div class="w-full max-w-4xl">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Apellido</th>
                        <th class="py-3 px-4 text-left">Asignatura</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-left">Aula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $profesor->nombre }}</td>
                            <td class="py-2 px-4">{{ $profesor->apellido }}</td>
                            <td class="py-2 px-4">{{ $profesor->asignatura->nombre }}</td>
                            <td class="py-2 px-4">{{ $profesor->email }}</td>
                            <td class="py-2 px-4">{{ $profesor->telefono }}</td>
                            <td class="py-2 px-4">{{ $profesor->aula }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>