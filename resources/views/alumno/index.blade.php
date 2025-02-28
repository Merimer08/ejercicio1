<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Listado de alumnos</h1>
        

        <div class="w-full max-w-4xl overflow-y-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg"> <!-- table pin rowsas genera el deslizar pero nose donde -->
                <thead class="bg-green-600 text-white">
                    <tr>
                         <!-- Enlace para ordenar por nombre -->
                        
                        <th class="py-3 px-4 text-left">
                            <a href="{{ route('alumnos.index', ['sort' => 'nombre', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
                                oOmbre
                                @if(request('sort') === 'nombre')
                                    @if(request('order') === 'asc')
                                        <span>&#8593;</span> <!-- Flecha hacia arriba -->
                                    @else
                                        <span>&#8595;</span> <!-- Flecha hacia abajo -->
                                    @endif
                                @endif
                            </a></th>
                        <th class="py-3 px-4 text-left">
                            <a href="{{ route('alumnos.index', ['sort' => 'apellido', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
                                Apellido
                                @if(request('sort') === 'apellido')
                                    @if(request('order') === 'asc')
                                        <span>&#8593;</span> <!-- Flecha hacia arriba -->
                                    @else
                                        <span>&#8595;</span> <!-- Flecha hacia abajo -->
                                    @endif
                                @endif
                            </a></th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left"> Teléfono</th>
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
    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" 
    id="formulario{{$alumno->id}}" 
    class="inline-block" 
    onsubmit=event.preventDefault()>
    @method('DELETE')
        @csrf
        
        <button type="submit" class="btn btn-sm bg-red-500 text-white rounded-lg hover:bg-red-300 px-4 py-2 transition-colors duration-300">Eliminar</button>
    </form>
</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            swal({
                title: "Confirmar Borrado",
                text: "¿Estas seguro de borrar el alumno?",
                icon: "warning",
                buttons: true

            }). then((
                fn (ok)=>{
                    if(ok){
                        const formulario = document.getElementById("formulario"+id);
                        formulario.submit();
                    }
                }
            ))
            
        }
</x-layouts.layout>
