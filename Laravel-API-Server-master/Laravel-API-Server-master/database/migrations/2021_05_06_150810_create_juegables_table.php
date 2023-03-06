<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('juego_id');
            $table->unsignedBigInteger('juegable_id');
            $table->string('juegable_type');

            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegables');
    }
}
