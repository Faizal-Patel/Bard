<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterWorkTable extends Migration
{
    public function up()
    {
        Schema::create('character_work', function (Blueprint $table) {
            $table->id();
            $table->string('char_id', 100); 
            $table->string('work_id', 100); 
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('char_id')->references('char_id')->on('shakespeare_characters')->onDelete('cascade');
            $table->foreign('work_id')->references('work_id')->on('shakespeare_works')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_work');
    }
}
