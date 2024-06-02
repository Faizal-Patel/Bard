<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterWorkSeeder extends Seeder
{
    /**
     * run db seeds
     *
     * @return void
     */
    public function run()
    {
        // fetch characters and their related works

        $characters = DB::table('shakespeare_characters')->get();

        $characterWorkRelationships = [];

        foreach ($characters as $character) {
            
            // Split the comma-separated work ids

            $workIds = explode(',', $character->char_work_ids);
            foreach ($workIds as $workId) {
                $characterWorkRelationships[] = [
                    'char_id' => $character->char_id,
                    
                    // Trim any extra spaces

                    'work_id' => trim($workId),
                ];
            }
        }

        DB::table('character_work')->insert($characterWorkRelationships);
    }

    /**
     * reverse db seeds
     *
     * @return void
     */
    public function down()
    {
        $characters = DB::table('shakespeare_characters')->get();

        foreach ($characters as $character) {
            $workIds = explode(',', $character->char_work_ids); 
            foreach ($workIds as $workId) {
                DB::table('character_work')->where([
                    ['char_id', '=', $character->char_id],
                    ['work_id', '=', trim($workId)]
                ])->delete();
            }
        }
    }
}
