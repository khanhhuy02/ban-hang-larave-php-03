<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::pluck('id');
        $categories = Category::pluck('id');

        foreach (range(1, 20) as $index) {
            $product = Product::factory()->count(3)->create([
                'brands_id' => $brands->random(),
                'categories_id' => $categories->random()
            ]);
        }
    }
}
