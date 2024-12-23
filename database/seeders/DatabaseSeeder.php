<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        User::factory()->create([
            'first_name' => 'Jon',
            'last_name' => 'Snow',
            'email' => 'jonsnow@gmail.com',
            'password' => 1234,
        ]);
    }
}
