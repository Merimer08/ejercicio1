<nav class="h-10v bg-nav flex justify-center items-center px-4 space-x-8 w-full ">
 <a href ="{{ route('about') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">About</a>
 <a href ="{{ route('noticias') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">Noticias</a>
 @auth
 <a href ="{{ route('alumnos.index') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">Alumnos</a> 
 <a href ="{{ route('profesores') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">Profesores</a> 
 <a href ="{{ route('proyectos') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">Proyectos</a> 
 @endauth
 <a href ="{{ route('contacto') }}" class="btn btn-outline text-black hover:bg-orange-300 hover:text-black">Contacto</a>

</nav>
