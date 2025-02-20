
<header class="h-15v bg-header flex flex-row justify-between
 items-center  p-3
">
    {{-- DONDE ESTA EL DE LOGIN   --}}
    <!--   -->
    <a href="{{ route('main') }}">
    <img class="h-16 max-h-full bg-white" src="{{ asset('img/logo.png') }}" alt="logo">
    </a>
    <h1 class="text-5xl  text-orange-500 text-center">DESARROLLO WEB </h1>
   
    @guest
            <form action="">
                <a href="{{route('login')}}" class="btn btn-sm btn btn-outline text-black hover:bg-orange-300 hover:text-black">Login</a>
                <a href="{{route('register')}}" class="btn btn-sm btn btn-active text-black hover:bg-orange-300 hover:text-black">Register</a>
                
            </form>
        @endguest
        @auth
            {{auth()->user()->name}}
                <form action="{{route("logout")}}" method="post">
                    @csrf
                    <input class="btn btn-sm" type="submit" value="logout">
                </form>

        @endauth

    </div>

</header>
{{--Diseño para moviles--}}
<header class="md:hidden bg-header flex flex-col justify-between
 items-center  p-3
">
    {{--    --}}
    <!--   -->
    <img  class="m-4 h-16 max-h-full bg-white" src="{{asset("images/logo.png")}}" alt="logo">
    <div>
        @guest
            <form action="">
                <a href="{{route('login')}}" class="btn btn-sm btn-primary btn-outline">Login</a>
                <button class="btn btn-sm">Register</button>
            </form>
        @endguest
        @auth
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method="post">
                @csrf
                <input class="btn btn-sm" type="submit" value="logout">
            </form>

        @endauth

    </div>

</header>
