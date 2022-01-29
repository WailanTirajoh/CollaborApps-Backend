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
            'email' => 'examplea@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Putri Rinding',
            'email' => 'exampleb@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
