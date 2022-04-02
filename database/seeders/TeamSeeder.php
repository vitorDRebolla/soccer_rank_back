<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            ['name' => 'América Mineiro'],
            ['name' => 'Atlético Paranaense'],
            ['name' => 'Atlético Goianiense'],
            ['name' => 'Atlético Mineiro'],
            ['name' => 'Avaí'],
            ['name' => 'Botafogo'],
            ['name' => 'Ceará'],
            ['name' => 'Corinthians'],
            ['name' => 'Coritiba'],
            ['name' => 'Cuiabá'],
            ['name' => 'Flamengo'],
            ['name' => 'Fluminense'],
            ['name' => 'Fortaleza'],
            ['name' => 'Goiás'],
            ['name' => 'Internacional'],
            ['name' => 'Juventude'],
            ['name' => 'Palmeiras'],
            ['name' => 'Bragantino'],
            ['name' => 'Santos'],
            ['name' => 'São Paulo'],
        ]);
    }
}
