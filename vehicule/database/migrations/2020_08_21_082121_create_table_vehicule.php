<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVehicule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('marque')->unseigned();
            $table->unsignedBigInteger('modele')->unseigned();
            $table->timestamps();
            $table->foreign('marque')
            ->references('id')->on('marques')
            ->onDelete('cascade');

            $table->foreign('modele')
            ->references('id')->on('modeles')
            ->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
