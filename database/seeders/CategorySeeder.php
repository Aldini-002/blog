<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Pemrograman',
            'slug' => 'pemrograman',
        ]);
        Category::factory()->create([
            'name' => 'Graph Design',
            'slug' => 'graph-design',
        ]);
        Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::factory()->create([
            'name' => 'Nature',
            'slug' => 'nature',
        ]);
        Category::factory()->create([
            'name' => 'Comedy',
            'slug' => 'comedy',
        ]);
    }
}
