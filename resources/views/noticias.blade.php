<x-layouts.layout>
    <div class="min-h-full flex flex-col justify-center items-center p-6">
        <h1 class="text-4xl text-green-700 mb-6">Últimas Noticias</h1>



        <!-- Grid de Noticias -->
        <div class="w-full max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($noticias as $noticia)
                    <div
                        class="bg-white border-2 border-green-200 shadow-lg rounded-lg overflow-hidden hover:border-orange-300 transition-all duration-300">
                        <img src="{{ $noticia['imagen'] }}" alt="{{ $noticia['categoria'] }}"
                            class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2 text-green-600">{{ $noticia['titulo'] }}</h2>
                            <p class="text-gray-700 mb-4">{{ $noticia['descripcion'] }}</p>
                            <button
                                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded inline-block transition-colors duration-300">
                                Leer más
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Categorías -->
            <div class="w-full max-w-6xl mb-8">
                <nav class="bg-green-600 text-white p-4 rounded-lg flex justify-center space-x-8">
                    <!-- Paginación -->
                    <div class="mt-8 flex justify-center">
                        {{ $noticias->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.layout>