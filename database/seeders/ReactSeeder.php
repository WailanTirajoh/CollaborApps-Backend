<?php

namespace Database\Seeders;

use App\Models\React;
use Illuminate\Database\Seeder;

class ReactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reacts = [
            'like',
            'dislike',
            'laugh',
            'angry',
            'hug',
        ];

        foreach ($reacts as $react) {
            React::create([
                'name' => $react
            ]);
        }
    }
}
