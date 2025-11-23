<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Category::factory()->create([
            'name' => 'Elektronic'
        ]);

        Category::factory()->create([
            'name' => 'Makanan'
        ]);

        Category::factory()->create([
            'name' => 'Minuman'
        ]);

        // Product::factory()->create([
        //     'name' => 'Samsung Galaxy A56 5G [8/256]',
        //     'category_id' => 1,
        //     'price' => 5999000,
        //     'stock' => 46,
        //     'release_year' => 2025,
        //     'color' => "Light Gray",
        //     'made_in' => "Indonesia",
        //     'status' => "Active",
        //     'image' => "samsung.jpg"
        // ]);
         
        User::factory()->create([
            "name" => "evan",
            "email" => "evan123@gmail.com",
            "password" => "12345678",
        ]);
    }
}
