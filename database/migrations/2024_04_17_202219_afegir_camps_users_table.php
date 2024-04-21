<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cognoms')->after('name');
            $table->enum('tipus', ['treballador', 'cap_departament'])->default('cap_departament')->after('password');
            $table->time('hora_entrada');
            $table->time('hora_sortida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cognoms', 'tipus', 'hora_entrada', 'hora_sortida']);
        });
    }
};

