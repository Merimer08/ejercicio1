<x-layouts.layout>
    @guest
  <div  class="hero min-h-full"
        style="background-image: url('{{asset('/img/fondo.jpg')}}');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
    
            <h1 class="mb-5 text-5xl font-bold">Bienvenido</h1>
            <p class="mb-5">
                Para acceder a la información de los alumnos, inicia sesión en la plataforma.
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        </div>
    </div>
    </div>
        
@endguest

    @auth
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-center">Ver Alumnos</h2>
                <p class="text-center">Accede a la lista de alumnos disponibles.</p>
                <div class="card-actions justify-center">
                    <button class="btn btn-primary">Ver Alumnos</button>
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-layouts.layout>
