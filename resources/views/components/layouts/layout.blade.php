<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Ejercicio 1 - Larabel'}}</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])  <!-- Tiene que ser un array. al ser 2 hay que hacerlo en array y ponerlo en [y las " entre medias] -->
</head>
<body >
<x-layouts.header />
<x-layouts.nav />

<main class="bg-main h-55v mt-10 " >
 
    {{$slot}}
</main>

<x-layouts.footer />



</body>
</html>
