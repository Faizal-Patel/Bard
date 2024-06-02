<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class ShakespeareSceneLocationsSeeder extends Seeder
{
    /**
     * run db seeds
     *
     * @return void
     */
    public function run()
    {
        // create a CSV reader instance
        $csv = Reader::createFromPath(database_path('seeders/shakespeare_scene_locations.csv'), 'r');
        
        // set the delimiter to semicolon
        $csv->setDelimiter(';');

        // set the CSV header offset
        $csv->setHeaderOffset(0);

        // get records from the CSV
        $records = $csv->getRecords();

        // insert each record into the database
        foreach ($records as $record) {
            DB::table('shakespeare_scene_locations')->insert([
                'scene_id' => $record['scene_id'],
                'work_id' => $record['scene_work_id'],
                'act' => $record['scene_act'],
                'scene' => $record['scene_scene'],
                'location' => $record['scene_location'],
            ]);
        }
    }
}
