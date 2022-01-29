<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = User::get();

        foreach ($users as $user) {
            for ($i = 0; $i < 20; $i++) {
                $user->posts()->save(new Post([
                    'text' => $faker->paragraph(),
                    'channel_id' => rand(1, 5)
                ]));
            }
        }
    }
}
