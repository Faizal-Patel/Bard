<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShakespeareSceneLocationsTable extends Migration
{
    /**
     * run migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shakespeare_scene_locations', function (Blueprint $table) {
            $table->id('scene_id');
            $table->string('work_id');
            $table->integer('act');
            $table->integer('scene');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * reverse migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shakespeare_scene_locations');
    }
}
