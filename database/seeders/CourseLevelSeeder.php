<?php

namespace Database\Seeders;

use App\Enums\Continent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_levels')->insert([
            [
                'course_id' => 1,
                'level' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) ,   
            ],
            [
                'course_id' => 1,
                'level' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) ,   
             ],
             [
                'course_id' => 1,
                'level' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) ,   
             ],
             [
                'course_id' => 2,
                'level' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) ,   
            ],
            [
                'course_id' => 2,
                'level' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) ,   
             ],
             [
                'course_id' => 2,
                'level' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) ,   
             ],
             [
                'course_id' => 3,
                'level' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) ,   
            ],
            [
                'course_id' => 3,
                'level' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) ,   
             ],
             [
                'course_id' => 3,
                'level' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) ,   
             ],

        ]);
    }
}
