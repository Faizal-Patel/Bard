<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShakespeareWorksTable extends Migration
{
    public function up()
    {
        Schema::create('shakespeare_works', function (Blueprint $table) {
            $table->string('work_id', 100)->primary();
            $table->string('work_title', 255);
            $table->string('work_long_title', 255);
            $table->smallInteger('work_year');
            $table->string('work_genre', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shakespeare_works');
    }
}
