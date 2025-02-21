<header class="h-15v bg-header flex flex-row items-center justify-between p-3 relative">
{{-- otra forma de poner anotaciones   --}}
<!--   -->   
<!-- Logo -->
    <a href="{{ route('main') }}">
        <img class="h-16 max-h-full bg-white" src="{{ asset('img/logo.png') }}" alt="logo">
    </a>

    <!-- Título centrado -->
    <h1 class="text-5xl text-orange-500 absolute left-1/2 transform -translate-x-1/2">DESARROLLO WEB</h1>

    <!-- Menú hamburguesa -->
    <div class="relative">
        <input type="checkbox" id="menu-toggler" class="peer hidden">
        <label for="menu-toggler" class="text-3xl cursor-pointer">&#9778;</label>
        
        <!-- Contenedor del menú -->
        <div class="hidden peer-checked:flex flex-col absolute right-0 top-full bg-white p-3 shadow-lg rounded-lg">
            @guest
                <a href="{{route('login')}}" class="btn btn-sm btn-outline text-black hover:bg-orange-300 hover:text-black">Login</a>
                <a href="{{route('register')}}" class="btn btn-sm btn-active text-black hover:bg-orange-300 hover:text-black">Register</a>
            @endguest
            @auth
                <p>{{auth()->user()->name}}</p>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <input class="btn btn-sm" type="submit" value="logout">
                </form>
            @endauth
        </div>
    </div>
</header>
