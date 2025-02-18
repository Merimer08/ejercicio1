<x-layouts.layout>
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Últimas Noticias</h1>

           <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4 flex justify-center space-x-4">
        <a href="#" class="hover:text-blue-400">Inicio</a>
        <a href="#" class="hover:text-blue-400">Natación</a>
        <a href="#" class="hover:text-blue-400">Esgrima</a>
        <a href="#" class="hover:text-blue-400">Snowboard</a>
    </nav>
    
    <!-- Contenido Principal -->
    <main class="flex-grow p-6 text-center">
        <h1 class="text-4xl font-bold mb-6">Últimas Noticias</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Noticia 1 -->
            <div class="card bg-white shadow-xl">
                <figure><img src="https://source.unsplash.com/400x250/?swimming" alt="Natación" /></figure>
                <div class="card-body">
                    <h2 class="card-title">Récord en Natación</h2>
                    <p>Un nadador rompe un récord mundial en la última competencia.</p>
                    <button class="btn btn-primary">Leer más</button>
                </div>
            </div>
            
            <!-- Noticia 2 -->
            <div class="card bg-white shadow-xl">
                <figure><img src="https://source.unsplash.com/400x250/?fencing" alt="Esgrima" /></figure>
                <div class="card-body">
                    <h2 class="card-title">Campeonato de Esgrima</h2>
                    <p>La final del torneo de esgrima nos dejó un duelo inolvidable.</p>
                    <button class="btn btn-primary">Leer más</button>
                </div>
            </div>
            
            <!-- Noticia 3 -->
            <div class="card bg-white shadow-xl">
                <figure><img src="https://source.unsplash.com/400x250/?snowboard" alt="Snowboard" /></figure>
                <div class="card-body">
                    <h2 class="card-title">Espectacular en Snowboard</h2>
                    <p>Un atleta ejecuta una maniobra nunca antes vista en una competencia oficial.</p>
                    <button class="btn btn-primary">Leer más</button>
                </div>
            </div>
        </div>
    </main>
 
    
</body>
</x-layout.layout>
