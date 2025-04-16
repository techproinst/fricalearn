<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezoneGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timezone_groups')->insert([
            [
                'name' => 'Africa/Europe',
                'timezones' => json_encode(['Africa/Lagos', 'Europe/London', 'Europe/Paris']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'USA/Canada',
                'timezones' => json_encode(['America/New_York', 'America/Chicago', 'America/Toronto']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Australia/Asia',
                'timezones' => json_encode(['Australia/Sydney', 'Asia/Tokyo', 'Asia/Singapore']),
                'created_at' => now(),
                'updated_at' => now()
            ]


        ]);
    }
}
