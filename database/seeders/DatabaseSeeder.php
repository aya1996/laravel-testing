<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'user',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
