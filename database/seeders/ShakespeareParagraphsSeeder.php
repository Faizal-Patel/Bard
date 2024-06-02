<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class ShakespeareParagraphsSeeder extends Seeder
{
    /**
     * run db seeds
     *
     * @return void
     */
    public function run()
    {
        // create a csv reader instance
        
        $csv = Reader::createFromPath(database_path('seeders/shakespeare_paragraphs.csv'), 'r');

        // set delimiter to semicolon
        $csv->setDelimiter(';'); 

        // set the csv header offset
        $csv->setHeaderOffset(0);

        // get records from csv
        $records = $csv->getRecords();

        // insert each record into db
        foreach ($records as $record) {
            DB::table('shakespeare_paragraphs')->insert([
                'par_id' => $record['par_id'],
                'par_work_id' => $record['par_work_id'],
                'par_act' => $record['par_act'],
                'par_scene' => $record['par_scene'],
                'par_number' => $record['par_number'],
                'par_char_id' => $record['par_char_id'],
                'par_text' => $record['par_text'],
            ]);
        }
    }
}
