<?php

use Illuminate\Database\Seeder;
use App\Models\Desarrolladora;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DesarrolladoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desarrolladoras')->truncate();

        //FILE JSON
        $json = File::get("database/data/desarrolladoras.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Desarrolladora::create(array(
            'nombre' => $obj->nombre,
            'slug' => $obj->slug,
          ));
        }

        //SEEDERS
        /*DB::table('desarrolladoras')->insert([
            'id' => '1',
            'nombre' => 'Ubisoft',
            'slug' => 'ubisoft',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '2',
            'nombre' => 'SIE Bend Studio',
            'slug' => 'sie-bend-studio',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '3',
            'nombre' => 'Electronics Arts',
            'slug' => 'electronic-arts',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '4',
            'nombre' => 'Vicarious Visions',
            'slug' => 'vicarious-visions',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '5',
            'nombre' => 'Team ICO',
            'slug' => 'team-ico',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '6',
            'nombre' => 'From Software',
            'slug' => 'from-software',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '7',
            'nombre' => 'Id Software',
            'slug' => 'id-software',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '8',
            'nombre' => 'Rockstar Games',
            'slug' => 'rockstar-games',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '9',
            'nombre' => 'Toys for Bob',
            'slug' => 'toys-for-bob',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '10',
            'nombre' => 'Rebelion',
            'slug' => 'rebelion',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '11',
            'nombre' => 'StudioMDHR',
            'slug' => 'studiomdhr',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '12',
            'nombre' => 'Bungie Studios',
            'slug' => 'bungie-studios',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '13',
            'nombre' => 'Other Ocean',
            'slug' => 'other-ocean',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '14',
            'nombre' => 'Radical Entertainment',
            'slug' => 'radical-entertaiment',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '15',
            'nombre' => 'Santa Monica Studio',
            'slug' => 'santa-monica-studio',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '16',
            'nombre' => 'Sucker Punch Productions',
            'slug' => 'sucker-punch-productions',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '17',
            'nombre' => 'Nintendo Entertainment',
            'slug' => 'nintendo-entertaiment',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '18',
            'nombre' => 'Guerrilla Games',
            'slug' => 'guerrilla-games',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '19',
            'nombre' => 'Mojang Studios',
            'slug' => 'mojang-studios',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '20',
            'nombre' => 'CD Projekt RED',
            'slug' => 'cd-projekt-red',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '21',
            'nombre' => 'Konami',
            'slug' => 'konami',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '22',
            'nombre' => 'The Coalition',
            'slug' => 'the-coalition',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '23',
            'nombre' => 'Bethesda Game Studios',
            'slug' => 'bethesda-game-studios',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '24',
            'nombre' => 'Retro Studios',
            'slug' => 'retro-studios',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '25',
            'nombre' => 'Square Enix',
            'slug' => 'square-enix',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '26',
            'nombre' => 'Game Freak',
            'slug' => 'game-freak',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '27',
            'nombre' => 'Beenox',
            'slug' => 'beenox',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '28',
            'nombre' => 'Capcom',
            'slug' => 'capcom',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '29',
            'nombre' => 'Tripwire Interactive',
            'slug' => 'tripwire-interactive',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '30',
            'nombre' => 'Hangar 13',
            'slug' => 'hangar-13',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '31',
            'nombre' => 'Naughty Dog',
            'slug' => 'nauhty-dog',
        ]);

        DB::table('desarrolladoras')->insert([
            'id' => '32',
            'nombre' => 'Warhorse Studios',
            'slug' => 'warhose-studios',
        ]);*/
    }
}
