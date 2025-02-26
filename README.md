## Mi proyecto de laravel

- composer update
- npm install
- php artisan migrate --> Para migrarlo
- npm run dev --> para activarlo (Siempre activarlo)
- php artisan serve --> para sacar la ID donde ver el trabajo actual
- docker compose up -d --> Una vez implementado la base de datos, siempre hay que levantar el docker

## Laravel trabajo iniciar

![alt text](documentacion/image.png)
![img.png](documentacion/image-1.png)


## Pendientes Resources
- Css —> app.css
- Views —>
    *   Auth para el login y el register
    * Components/layouts —> estructura de la pagina que quiero que se vea en todas las paginas. Creas los estilos de las mismas al tener separado footer header 
- Routes —> web.php


## RUtas del navegador para añadirlas en web.php

## publicarlo gon git
-  npm i -D gh-pages
- npm run build
- npm run deploy

## cambiar la ruta una vez que este hecho el login

en web añadimos la rutra de regreso

![alt text](documentacion/image1.png)


en app / http / controller y auth ponemos la ruta
![alt text](documentacion/image2.png)

## tailwind 
en theme editas el tema del ejercicio

![alt text](documentacion/image3.png)


## Como pasar atributaos de  la pagina a la plantilla
![alt text](documentacion/image-5.png)

![alt text](documentacion/image-4.png)


## Delete archivos
### view carpeta profile
- carpeta completa profile
![alt text](documentacion/imgb1.png)
- carpeta completalayouts
![alt text](documentacion/imgb2.png)
- dashboard.blade.php
-  welcome.blade.php


## Carpeta database


1º Migraciones:
    - Crear y modificar tablas-
        Necesitra estar en un gestion de base de datos.

        Creamos una maquina de doocker, que sera el gestor de la base de datos.(SERVIDOR)

    ### Docker-compose.yaml --> altura general
         Crearemos dos contenedores o servicios relacion 1:1
         - mysql 
            - el puerto inicial donde entra y el segundo a donde reconduzco
            - restart always si se cae el serviio regresa
            -enviroment para personalizar la base de datos
                - encerrar entre llaves por si tiene otro caracter
         -phpmyadmin
            - identificador de la otra maquina
en env configuramos el port
![alt text](documentacion/imagd.png)
-
![alt text](documentacion/imagd1.png)
-
![alt text](documentacion/imagd2.png) importante quitar de env las #

Y para hacerlo funcionar docker compose up -d

### limpieza de docker y de mysql
![alt text](documentacion/borrard.png)
![alt text](documentacion/borrard1.png)
![alt text](documentacion/borrard2.png)
![alt text](documentacion/borrard3.png)
 

 - Meter en gitgnore mysql y php artisan migrate
2º factorias--> clases de larabel que me permiten fabricar valoores
3º Ider clases de laravel que me permite llamar a latabla que me permite gestionar los datos


## el local host
http://localhost:8100/index.php?route=/

alumno alumno
- php artisan migrate --> importante el mysql tiene que estr en minuscula
![alt text](documentacion/imagefab.png)
- php artisan make:migration AlumnoMigration
![alt text](documentacion/imagefab-1.png)
![alt text](documentacion/imagefab-2.png)

## añadir base de datos
- a traves de $schema 
![alt text](documentacion/imagefab-3.png)

~$ table ->id hace referencia  a 'alumnos
~ $ table -> timestamps -> created -at: fecha de creación
                        -> updated -at: ultima vez modificado
                        -> para auditorias create
    Se crea por defecto en laravel y sirve para auditorias
![alt text](documentacion/imagefab-4.png)

### fabricar valores -- factory
![alt text](documentacion/imagefab-5.png)

Un Factory es una clase que define cómo crear datos de prueba (fake data) para un modelo. Es muy útil para:

Testing
Seeding (poblar la base de datos con datos de ejemplo)
Desarrollo local

### fabricar coger los valores y meterlos en la base de datos--sider

La relación entre ambos es que el Factory necesita el Modelo para crear instancias de datos, y el Modelo necesita el trait HasFactory para poder usar el Factory.

### modelo
- se necesita al ser una clase para interactuar en una base de datos concreto

# Ver rutas
- php artisan route:list --name="alumno"
![alt text](documentacion/ruta.png)

- Route::get(): Define rutas específicas, generalmente para una sola acción o método (como index(), show(), etc.), y se utiliza cuando necesitas un control preciso sobre las rutas.
- Route::resource(): Genera automáticamente rutas RESTful para realizar las operaciones CRUD completas (indexar, mostrar, crear, editar, actualizar, eliminar) en el recurso (en este caso, alumnos).

![alt text](documentacion/ruta-1.png)
**Route::resource()** se usa para generar automáticamente un conjunto de rutas RESTful para un recurso. Estas rutas cubren todas las operaciones CRUD estándar (Crear, Leer, Actualizar, Eliminar), como se espera en una arquitectura RESTful.

Cuando usas Route::resource(), Laravel crea múltiples rutas para el mismo controlador con métodos específicos para cada operación.
![alt text](documentacion/ruta-2.png)

Route::get() se usa para definir rutas específicas que manejan solicitudes HTTP GET en una URL determinada. La ruta get está asociada con una acción o función, y se puede utilizar para manejar un solo tipo de solicitud (en este caso, solicitudes GET).


# Actualizar las bases de datos
![alt text](documentacion/imagefab-6.png)

## Migraciones 
- php artisan migrate--> CREA TABLAS