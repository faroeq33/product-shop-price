<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $categories = ['Zoet', 'Gebak', 'Fruit'];

        foreach ($categories as $categoryName) {
            Category::factory()
                ->has(Product::factory())
                ->count(1) // You can specify the number of products you want for each category here
                ->create(['name' => $categoryName]);
        }
    }
}
