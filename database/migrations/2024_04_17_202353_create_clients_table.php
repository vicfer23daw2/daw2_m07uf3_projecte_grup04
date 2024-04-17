9<?php

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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('dni_client', 9)->primary();
            $table->string('nom', 50);
            $table->string('cognoms', 100);
            $table->integer('edat');
            $table->string('telefon', 20);
            $table->string('adressa');
            $table->string('ciutat', 50);
            $table->string('pais', 50);
            $table->string('email', 100)->unique();
            $table->enum('targeta', ['debit', 'credit']);
            $table->string('num_targeta', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
