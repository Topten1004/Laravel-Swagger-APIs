<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the applications database.
     *
     * @return void
     */
    public function run()
    {
        $this->setFKCheckOff();
        $this->call(DesarrolladoraSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(JuegoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JuegableSeeder::class);
        $this->setFKCheckON();
    }

    private function setFKCheckOff() {
        switch(DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                break;
            case 'sqlite':
                DB::statement('PRAGMA foreign_keys = OFF');
                break;
            case 'pgsql':
                break;
        }
    }

    private function setFKCheckOn() {
        switch(DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                break;
            case 'sqlite':
                DB::statement('PRAGMA foreign_keys = ON');
                break;
            case 'pgsql':
                break;
        }
    }

}
