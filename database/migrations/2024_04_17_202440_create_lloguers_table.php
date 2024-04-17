<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lloguers', function (Blueprint $table) {
            $table->string('dni_client', 9);
            $table->string('codi_apartament', 7);
            $table->date('data_inici');
            $table->time('hora_inici');
            $table->date('data_finalitzacio');
            $table->time('hora_finalitzacio');
            $table->string('lliurament_claus', 50);
            $table->string('devolucio_claus', 50);
            $table->float('preu_dia');
            $table->boolean('diposit')->default(false);
            $table->float('quantitat_diposit')->nullable();
            $table->enum('asseguransa', ['franquicia_fins_1000_euros', 'franquicia_fins_500_euros', 'sense_franquicia']);
            $table->timestamps();

            $table->primary(['dni_client', 'codi_apartament']);

            $table->foreign('dni_client')->references('dni_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('codi_apartament')->references('codi_apartament')->on('apartaments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lloguers');
    }
};
