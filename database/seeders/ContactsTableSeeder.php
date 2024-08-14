<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Daniela Mallozi',
            'email' => 'admin@gmail.com',
            'cedula' => '000000001',
            'address' => 'Zona Centro',
            'phone' => '0123456789',
        ]);
    }
}
