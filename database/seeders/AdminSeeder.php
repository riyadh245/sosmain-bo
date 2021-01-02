<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => ('admin admin'),
            'forename' => ('admin'),
            'lastname' => ('admin'),
            'user_type' => ('admin'),
            'email' => ('admin@sosmain.com'),
            'password' => Hash::make('password'),
            'phone_number' => ('0123456789'),
            'rpps_number' => ('12345678910'),
            'hpc_picture' => ('qwertyuiop'),
            'picture' =>('asdfghjkl'),
            'status' => ('validated')
        ]);
    }
}
