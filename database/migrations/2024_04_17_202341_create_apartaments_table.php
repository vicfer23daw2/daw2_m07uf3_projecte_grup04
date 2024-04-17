<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('apartaments', function (Blueprint $table) {
            $table->string('codi_apartament', 7)->primary();
            $table->string('ref_catastral', 20);
            $table->string('ciutat', 50);
            $table->string('barri', 50);
            $table->string('nom_carrer', 100);
            $table->string('numero_carrer', 50);
            $table->string('pis', 50)->nullable();
            $table->integer('nombre_llits');
            $table->integer('nombre_habitacions');
            $table->boolean('ascensor')->default(false);
            $table->enum('calefaccio', ['electrica', 'gas_natural', 'buta']);
            $table->boolean('aire_condicionat')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('apartaments');
    }
};