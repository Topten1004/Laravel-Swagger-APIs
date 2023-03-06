<?php

use Illuminate\Database\Seeder;
use App\Models\Genero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->truncate();

        //FILE JSON
        $json = File::get("database/data/generos.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Genero::create(array(
            'nombre' => $obj->nombre,
            'slug' => $obj->slug,
          ));
        }

        //SEEDERS
        /*DB::table('generos')->insert([
            'nombre' => '4X',
            'slug' => '4x',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Acción',
            'slug' => 'accion',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Arcade',
            'slug' => 'arcade',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'ARPG',
            'slug' => 'arpg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Aventura',
            'slug' => 'aventura',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Aventura conversional',
            'slug' => 'aventura-conversional',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Aventura gráfica',
            'slug' => 'aventura-grafica',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Baile',
            'slug' => 'baile',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Battle Royale',
            'slug' => 'battle-royale',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Beat em Up',
            'slug' => 'beat-em-up',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Brawler',
            'slug' => 'brawler',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Bullethell',
            'slug' => 'bullethell',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Cartas',
            'slug' => 'cartas',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Carreras',
            'slug' => 'carreras',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'CCG',
            'slug' => 'ccg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Clicker',
            'slug' => 'clicker',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Creación musical',
            'slug' => 'creacion-musical',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Competitivo',
            'slug' => 'competitivo',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Deportes',
            'slug' => 'deportes',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Dual Stick Shooter',
            'slug' => 'dual-stick-shooter',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Dungeon Crawler',
            'slug' => 'dungeon-crawler',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Endless Runner',
            'slug' => 'endless-runner',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Estrategia en tiempo real',
            'slug' => 'estrategia-en-tiempo-real',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Estrategia por turnos',
            'slug' => 'estrategia-por-turnos',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'First Person Shooter',
            'slug' => 'first-person-shooter',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'First Person Walker',
            'slug' => 'first-person-walker',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'FPS',
            'slug' => 'fps',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Gestión',
            'slug' => 'gestion',
        ]);
        
        DB::table('generos')->insert([
            'nombre' => 'God Game',
            'slug' => 'god-game',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Gran Estrategia',
            'slug' => 'gran-estrategia',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Hack n Slash',
            'slug' => 'hack-n-slash',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Hero Shooter',
            'slug' => 'hero-shooter',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Incremental',
            'slug' => 'incremental',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'JRPG',
            'slug' => 'jrpg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Karaoke',
            'slug' => 'karaoke',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Libro juego',
            'slug' => 'libro-juego',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Lucha',
            'slug' => 'lucha',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Matamarcianos',
            'slug' => 'matamarcianos',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Mánager',
            'slug' => 'manager',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Metroidvania',
            'slug' => 'metroidvania',
        ]);
        
        DB::table('generos')->insert([
            'nombre' => 'MMO',
            'slug' => 'mmo',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'MMORPG',
            'slug' => 'mmorpg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'MOBA',
            'slug' => 'moba',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Multijugador',
            'slug' => 'multijugador',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Musical',
            'slug' => 'musical',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Musou',
            'slug' => 'musou',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Novela Visual',
            'slug' => 'novela-visual',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Party Game',
            'slug' => 'party-game',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Pelicula interactiva',
            'slug' => 'pelicula-interactiva',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Plataformas',
            'slug' => 'plataformas',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Point and Click',
            'slug' => 'point-and-click',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Real-time 3D',
            'slug' => 'real-time 3D',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Point and Shoot',
            'slug' => 'point-and-shoot',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Ritmo',
            'slug' => 'ritmo',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'RLS',
            'slug' => 'rls',
        ]);
        
        DB::table('generos')->insert([
            'nombre' => 'Roguelike',
            'slug' => 'roguelike',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Roguelite',
            'slug' => 'roguelite',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'RPG',
            'slug' => 'rpg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'RPG de Acción',
            'slug' => 'rpg-de-accion',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'RPG tactico',
            'slug' => 'rpg-tactico',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'RTS',
            'slug' => 'rts',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Run and Gun',
            'slug' => 'run-and-gun',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Sandbox',
            'slug' => 'sandbox',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Sandbox RPG',
            'slug' => 'sandbox-rpg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Shmup',
            'slug' => 'shmup',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Shoot em Up',
            'slug' => 'shoot-em-up',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Shooter',
            'slug' => 'shooter',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Shooter on Rails',
            'slug' => 'shooter-on-rails',
        ]);
        
        DB::table('generos')->insert([
            'nombre' => 'Sigilo',
            'slug' => 'sigilo',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Sim',
            'slug' => 'sim',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Simulación',
            'slug' => 'simulacion',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Simulador',
            'slug' => 'simulador',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Soulslike',
            'slug' => 'soulslike',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Survival',
            'slug' => 'survival',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Survival Horror',
            'slug' => 'survival Horror',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'TBS',
            'slug' => 'tbs',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'TCG',
            'slug' => 'tcg',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Third Person Shooter',
            'slug' => 'third-person-shooter',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'Tower Defense',
            'slug' => 'tower-defense',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'TPS',
            'slug' => 'tps',
        ]);
        
        DB::table('generos')->insert([
            'nombre' => 'Tycoon',
            'slug' => 'tycoon',
        ]);

        DB::table('generos')->insert([
            'nombre' => 'WarGame',
            'slug' => 'wargame',
        ]);*/

    }
}
