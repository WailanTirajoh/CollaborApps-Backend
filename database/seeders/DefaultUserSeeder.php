<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wailan Tirajoh',
            'email' => 'wailantirajoh@gmail.com',
            'password' => bcrypt('wailan'),
        ]);
        User::create([
            'name' => 'Putri Rinding',
            'email' => 'putririnding21@gmail.com',
            'password' => bcrypt('putri'),
        ]);
    }
}
