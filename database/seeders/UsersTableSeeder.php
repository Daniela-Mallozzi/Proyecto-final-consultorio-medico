<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Daniela',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // password
            'cedula' => '018001234567',
            'address' => 'Zona centro',
            'phone' => '8341234567',
            'role' => 'admin',
            'slug' => Str::slug('Administrador')
        ]);

        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('paciente123'), // password
            'role' => 'paciente',
            'slug' => Str::slug('Paciente')
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('doctor123'), // password
            'role' => 'doctor',
            'slug' => Str::slug('Doctor')
        ]);
    }
}
