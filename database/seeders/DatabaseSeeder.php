<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        Slider::factory()->count(3)->create();
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
