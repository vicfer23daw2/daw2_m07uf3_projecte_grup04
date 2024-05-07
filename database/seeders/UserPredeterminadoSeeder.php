<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPredeterminadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'cognoms' => 'Admin',
            'email' => 'predeterminado@touristrent.com',
            'password' => Hash::make('password'),
            'tipus' => 'cap_departament',
            'hora_entrada' => '09:00:00',
            'hora_sortida' => '10:00:00',
        ]);
    }
}
