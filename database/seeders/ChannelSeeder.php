<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'Unilever International',
            'OK Bank Indonesia',
            'MGM Bosco Logistics',
            'Samsung',
            'Asimor',
            'Lentera Kesehatan Nusantara',
        ];

        foreach ($channels as $channel) {
            Channel::create([
                'name' => $channel,
                'slug' => Str::slug($channel)
            ]);
        }
    }
}
