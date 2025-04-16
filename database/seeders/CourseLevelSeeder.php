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
                'level_name' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) ,
              'purpose' => 'course payment',
              'description' => 'payment for introductory level of yoruba course',   
            ],
            [
                'course_id' => 1,
                'level_name' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) ,
              'purpose' => 'course payment',
              'description' => 'payment for beginner level of yoruba course',    
             ],
             [
                'course_id' => 1,
                'level_name' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) ,
                'purpose' => 'course payment',
                'description' => 'payment for intermediate level of yoruba course',       
             ],
             [
                'course_id' => 2,
                'level_name' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) ,
              'purpose' => 'course payment',
              'description' => 'payment for introductory level of igbo course',       
            ],
            [
                'course_id' => 2,
                'level_name' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) ,
              'purpose' => 'course payment',
              'description' => 'payment for beginner level of igbo course',   
             ],
             [
                'course_id' => 2,
                'level_name' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) ,
                'purpose' => 'course payment',
                'description' => 'payment for intermediate level of igbo course',   
             ],
             [
                'course_id' => 3,
                'level_name' => 'introductory',
                'price' => json_encode([
                    Continent::AFRICA->value => 120000.00,
                    Continent::OTHER->value  => 1200,
              ]) , 
              'purpose' => 'course payment',
              'description' => 'payment for introductory level of hausa course',  
            ],
            [
                'course_id' => 3,
                'level_name' => 'beginner',
                'price' => json_encode([
                    Continent::AFRICA->value => 130000.00,
                    Continent::OTHER->value  => 1300,
              ]) , 
              'purpose' => 'course payment',
              'description' => 'payment for beginner level of hausa course',  
             ],
             [
                'course_id' => 3,
                'level_name' => 'intermediate',
                'price' => json_encode([
                    Continent::AFRICA->value => 140000.00,
                    Continent::OTHER->value  => 1400,
                ]) , 
                'purpose' => 'course payment',
                'description' => 'payment for intermediate level of hausa course',  
             ],

        ]);
    }
}
