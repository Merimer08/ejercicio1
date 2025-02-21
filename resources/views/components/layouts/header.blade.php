<header class="md:h-15v bg-header flex flex-row items-center justify-between p-3 relative">
    <!-- Logo -->
    <a href="{{ route('main') }}">
        <img class="h-12 sm:h-16 md:h-20 max-h-full bg-white" src="{{ asset('img/logo.png') }}" alt="logo">
    </a>

    <!-- Título centrado -->
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-orange-500 text-center absolute left-1/2 transform -translate-x-1/2">
        DESARROLLO WEB
    </h1>

    <!-- Menú hamburguesa para móviles -->
    <div class="relative md:hidden">
        <input type="checkbox" id="menu-toggler" class="peer hidden">
        <label for="menu-toggler" class="text-3xl cursor-pointer">&#9778;</label>

        <!-- Menú desplegable en móviles -->
        <div class="peer-checked:flex flex-col absolute right-0 top-full bg-white p-3 shadow-lg rounded-lg space-y-4 hidden">
            @guest
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline text-black hover:bg-orange-300 hover:text-black">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-active text-black hover:bg-orange-300 hover:text-black">Register</a>
            @endguest
            @auth
                <p>{{ auth()->user()->name }}</p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="btn btn-sm" type="submit" value="logout">
                </form>
            @endauth
        </div>
    </div>
</header>
