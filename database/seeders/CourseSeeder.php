<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'name' => 'yoruba',
                'description' => 'Ẹ kú àbẹ́wò! This course introduces children to the Yorùbá language (èdè Yorùbá) and culture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'igbo',
                'description' => 'Nnọọ! Welcome! This interactive course introduces children to the Igbo language and culture through fun',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'hausa',
                'description' => 'This course introduces children to the basics of the Hausa language (Harshen Hausa) and culture.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]

        ]);
    }
}
