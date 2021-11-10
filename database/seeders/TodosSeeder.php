<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::create([
            'name' => 'Paul',
            'lastname' => 'Walker',
            'dni' => '22076980',
            'rol' => 'Administrador',
            'email' => 'wpaul@yahoo.com',
            'password' => Hash::make('admin'),
        ]);

        $userDocente = User::create([
            'name' => 'Marylin',
            'lastname' => 'Gonzalez',
            'dni' => '22076900',
            'rol' => 'Docente',
            'email' => 'marygon@yahoo.com',
            'password' => Hash::make('docente'),
        ]);

        $userDirectivo = User::create([
            'name' => 'Maria',
            'lastname' => 'Ibarra',
            'dni' => '22076987',
            'rol' => 'Directivo',
            'email' => 'mari@yahoo.com',
            'password' => Hash::make('directivo'),
        ]);

        $userAlumno = User::create([
            'name' => 'Enzo',
            'lastname' => 'Perez',
            'dni' => '22076976',
            'rol' => 'Alumno',
            'email' => 'perez@yahoo.com',
            'password' => Hash::make('alumno'),
        ]);
    }
}
