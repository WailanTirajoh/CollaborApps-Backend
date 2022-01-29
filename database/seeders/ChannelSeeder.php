<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = [
            'a',
            'b',
            'c',
            'd',
            'e',
        ];

        foreach ($channels as $channel) {
            Channel::create([
                'name' => $channel
            ]);
        }
    }
}
