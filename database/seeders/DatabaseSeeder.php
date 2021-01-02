<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create(['user_type' => 'doctor']);
        \App\Models\User::factory(20)->create(['user_type' => 'expert']);
        \App\Models\Center::factory(20)->create();
        \App\Models\Patient::factory(20)->create();
        $this->call(AdminSeeder::class);
    } 
}
