<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfigGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_game', function (Blueprint $table) { 
            $table->string('name')->nullable(); 
            $table->string('phrase')->nullable(); 
            $table->string('description_form')->nullable(); 
            $table->string('image_background_url')->nullable(); 
            $table->string('image_second_url')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_game');
    }
}
