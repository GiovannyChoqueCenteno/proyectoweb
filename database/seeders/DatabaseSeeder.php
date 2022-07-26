<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('usuario')->insert([
            [
                'codigo' => 'prueba3',
                'nombre' => 'Prueba',
                'apellido' => 'Prueba',
                'email' => 'prueba3@gmail.com',
                'pass' => Hash::make('12345678'),
                'idrol' => 3,
            ],
            [
                'codigo' => 'prueba1',
                'nombre' => 'Prueba',
                'apellido' => 'Prueba',
                'email' => 'prueba1@gmail.com',
                'pass' => Hash::make('12345678'),
                'idrol' => 1,
            ],
            [
                'codigo' => 'prueba2',
                'nombre' => 'Prueba',
                'apellido' => 'Prueba',
                'email' => 'prueba2@gmail.com',
                'pass' => Hash::make('12345678'),
                'idrol' => 2,
            ]
        ]);

        DB::table('docente')->insert([
            [
                'codigo' => 'prueba2'
            ]
        ]);

        DB::table('estudiante')->insert([
            [
                'codigo' => 'prueba3'
            ]
        ]);

        DB::table('vicedecano')->insert([
            [
                'codigo' => 'prueba1'
            ]
        ]);
    }
}
