<x-layouts.layout>
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Últimas Noticias</h1>

        <!-- Buscador -->
        <div class="mb-6">
            <input
                type="text"
                id="newsSearch"
                placeholder="Buscar noticias..."
                class="input input-bordered w-full"
            />
        </div>

        <!-- Lista de noticias -->
        <div id="newsList" class="space-y-4">
            <!-- Noticia 1 -->
            <div class="card bg-base-100 shadow-lg p-4 flex" data-title="Noticia 1">
                <div class="avatar">
                    <div class="w-20 h-20 rounded">
                        <img src="https://via.placeholder.com/150" alt="Imagen noticia 1" />
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="card-title text-lg">Noticia 1</h2>
                    <p class="text-sm text-gray-500">
                        Resumen corto de la noticia, explicando brevemente
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>
