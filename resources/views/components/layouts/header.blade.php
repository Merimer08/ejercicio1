</x.layouts.header>
<header class="h-15v bg-header flex flex-row justify-between
 items-center  p-3
">
    {{--    --}}
    <!--   -->
    <img class="h-16 max-h-full bg-white" src="{{asset("img/logo.png")}}" alt="logo">
    <h1 class="text-5xl text-orange-500 ">DESARROLLO WEB</h1>
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
</x.layouts.header>
