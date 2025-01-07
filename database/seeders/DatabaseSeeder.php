<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobTitle;
use App\Models\Department;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::factory(3)->create();
        Category::factory(10)->create();
        JobTitle::factory(10)->create();
        User::factory()->create([
            'first_name' => 'Jon',
            'last_name' => 'Snow',
            'email' => 'jonsnow@gmail.com',
            'password' => 1234,
        ]);
        ProjectCategory::factory(20)->create();
    }
}
