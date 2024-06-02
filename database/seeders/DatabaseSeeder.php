<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder

{
    public function run()
    
    {
        $this->call([ShakespeareWorksTableSeeder::class, 
                    ShakespeareCharactersSeeder::class, 
                    CharacterWorkSeeder::class, 
                    ShakespeareParagraphsSeeder::class, 
                    ShakespeareSceneLocationsSeeder::class]);
    }

}
