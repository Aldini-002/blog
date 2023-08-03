<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Aldini 002',
            'email' => '002aldini@gmail.com',
            'password' => bcrypt('123123'),
            'role' => 'admin'
        ]);

        User::factory(2)->create();

        Blog::factory(100)->create();

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
