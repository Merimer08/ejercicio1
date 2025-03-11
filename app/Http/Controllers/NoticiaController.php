<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NoticiaController extends Controller
{
    private $noticias_base = [
        [
            'titulo' => 'Récord en Natación',
            'descripcion' => 'Un nadador rompe un récord mundial en la última competencia.',
            'imagen' => 'https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg',
            'categoria' => 'Natación'
        ],
        [
            'titulo' => 'Campeonato de Esgrima',
            'descripcion' => 'La final del torneo de esgrima nos dejó un duelo inolvidable.',
            'imagen' => 'https://images.pexels.com/photos/7273897/pexels-photo-7273897.jpeg',
            'categoria' => 'Esgrima'
        ],
        [
            'titulo' => 'Espectacular en Snowboard',
            'descripcion' => 'Un atleta ejecuta una maniobra nunca antes vista en una competencia oficial.',
            'imagen' => 'https://images.pexels.com/photos/848618/pexels-photo-848618.jpeg',
            'categoria' => 'Snowboard'
        ],
        [
            'titulo' => 'Final de Tenis',
            'descripcion' => 'El torneo de tenis local culmina con una final histórica.',
            'imagen' => 'https://images.pexels.com/photos/8224691/pexels-photo-8224691.jpeg',
            'categoria' => 'Tenis'
        ],
        [
            'titulo' => 'Torneo de Baloncesto',
            'descripcion' => 'El equipo local se proclama campeón del torneo regional.',
            'imagen' => 'https://images.pexels.com/photos/358042/pexels-photo-358042.jpeg',
            'categoria' => 'Baloncesto'
        ],
        [
            'titulo' => 'Voleibol Playa',
            'descripcion' => 'Nuevo torneo de voleibol playa atrae a equipos internacionales.',
            'imagen' => 'https://images.pexels.com/photos/1263426/pexels-photo-1263426.jpeg',
            'categoria' => 'Voleibol'
        ],
        [
            'titulo' => 'Rugby Sevens',
            'descripcion' => 'El equipo nacional se prepara para el próximo torneo de Rugby Sevens.',
            'imagen' => 'https://images.pexels.com/photos/3148452/pexels-photo-3148452.jpeg',
            'categoria' => 'Rugby'
        ],
        [
            'titulo' => 'Maratón Local',
            'descripcion' => 'La maratón anual bate récord de participación con más de 1000 corredores.',
            'imagen' => 'https://images.pexels.com/photos/2526878/pexels-photo-2526878.jpeg',
            'categoria' => 'Atletismo'
        ],
        [
            'titulo' => 'Gimnasia Artística',
            'descripcion' => 'La selección de gimnasia artística logra medalla de oro en el campeonato regional.',
            'imagen' => 'https://images.pexels.com/photos/4662438/pexels-photo-4662438.jpeg',
            'categoria' => 'Gimnasia'
        ],
        [
            'titulo' => 'Ciclismo de Montaña',
            'descripcion' => 'Espectacular victoria en el circuito de montaña más desafiante.',
            'imagen' => 'https://images.pexels.com/photos/71104/utah-mountain-biking-bike-biking-71104.jpeg',
            'categoria' => 'Ciclismo'
        ],
        [
            'titulo' => 'Boxeo Profesional',
            'descripcion' => 'El campeón retiene su título en una pelea memorable.',
            'imagen' => 'https://images.pexels.com/photos/4761792/pexels-photo-4761792.jpeg',
            'categoria' => 'Boxeo'
        ],
        [
            'titulo' => 'Campeonato de Surf',
            'descripcion' => 'Surfistas locales destacan en el campeonato internacional.',
            'imagen' => 'https://images.pexels.com/photos/1654489/pexels-photo-1654489.jpeg',
            'categoria' => 'Surf'
        ],
        [
            'titulo' => 'Torneo de Ajedrez',
            'descripcion' => 'El gran maestro sorprende con una estrategia innovadora.',
            'imagen' => 'https://images.pexels.com/photos/260024/pexels-photo-260024.jpeg',
            'categoria' => 'Ajedrez'
        ],
        [
            'titulo' => 'Hockey sobre Hielo',
            'descripcion' => 'Victoria dramática en la final del campeonato de hockey.',
            'imagen' => 'https://images.pexels.com/photos/47730/the-ball-stadion-football-the-pitch-47730.jpeg',
            'categoria' => 'Hockey'
        ],
        [
            'titulo' => 'Escalada Deportiva',
            'descripcion' => 'Nuevo récord en la competencia de escalada en roca.',
            'imagen' => 'https://images.pexels.com/photos/449609/pexels-photo-449609.jpeg',
            'categoria' => 'Escalada'
        ],
    ];

    public function index(Request $request)
    {
        $noticias = [];
        $paginas = [
            'Competencias Internacionales',
            'Torneos Nacionales',
            'Eventos Regionales',
            'Campeonatos Locales',
            'Deportes Juveniles'
        ];

        // Generar 45 noticias (5 páginas de 9 noticias)
        foreach ($paginas as $pagina) {
            // Mezclar las noticias base para cada página
            $noticias_mezcladas = collect($this->noticias_base)->shuffle()->take(9);

            foreach ($noticias_mezcladas as $noticia) {
                $nueva_noticia = $noticia;
                $nueva_noticia['id'] = count($noticias) + 1;
                $nueva_noticia['titulo'] = $noticia['titulo'] . ' - ' . $pagina;
                $noticias[] = $nueva_noticia;
            }
        }

        // Obtener la página actual
        $page = $request->get('page', 1);
        $perPage = 9;

        // Crear el paginador
        $paginador = new LengthAwarePaginator(
            collect($noticias)->forPage($page, $perPage),
            count($noticias),
            $perPage,
            $page,
            ['path' => $request->url()]
        );

        return view('noticias', ['noticias' => $paginador]);
    }
}