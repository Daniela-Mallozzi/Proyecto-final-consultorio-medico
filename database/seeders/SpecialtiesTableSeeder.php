<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Neurología',
            'Ginecología',
            'Pediatría',
            'Cardiología',
            'Medicina general',
        ];
        foreach ($specialties as $specialtyName) {
            $specialty = Specialty::create([
                'name' => $specialtyName,
                'slug' => Str::slug($specialtyName)
            ]);
            $specialty->users()->saveMany(
                User::factory(2)->state(['role' => 'doctor'])->make()
            );
        }
        User::find(3)->specialties()->save($specialty);
    }
}
