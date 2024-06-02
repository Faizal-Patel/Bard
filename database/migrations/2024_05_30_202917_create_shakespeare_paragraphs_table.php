<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShakespeareParagraphsTable extends Migration
{
    /**
     * run migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shakespeare_paragraphs', function (Blueprint $table) {
            $table->integer('par_id');
            $table->string('par_work_id', 100);
            $table->integer('par_act');
            $table->integer('par_scene');
            $table->integer('par_number');
            $table->string('par_char_id', 255);
            $table->text('par_text');
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
        Schema::dropIfExists('shakespeare_paragraphs');
    }
}
