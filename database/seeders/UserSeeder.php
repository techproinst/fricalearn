<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'dahud',
                'email' => 'dahudyusufishola@gmail.com',
                'password' => Hash::make('1234'),
            ],
            // [
            //     'name' => 'abiodun',
            //     'email' => 'abiodunyusuf4@gmail.com',
            //     'password' => Hash::make('1234'),
            // ],
            // [
            //     'name' => 'kazeem',
            //     'email' => 'kareemkazeem100@gmail.com',
            //     'password' => Hash::make('1234'),
            // ]



        ]);
    }
}
