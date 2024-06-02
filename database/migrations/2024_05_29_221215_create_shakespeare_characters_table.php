<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShakespeareCharactersTable extends Migration
{
    public function up()
    {
        Schema::create('shakespeare_characters', function (Blueprint $table) {
            $table->string('char_id', 255)->primary();
            $table->string('char_work_ids', 255); 
            $table->string('char_name', 255);
            $table->string('char_abbrev', 255);
            $table->string('char_description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shakespeare_characters');
    }
}
