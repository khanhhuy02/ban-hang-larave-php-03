<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Brand;
use app\Models\Product;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;   

    public function definition()
    {
        $faker = \Faker\Factory::create();

        // Lấy danh sách các category ID từ cơ sở dữ liệu
  

        return [
            'categories_id' => function () {
                return Category::factory()->create()->id;
            },
            'brands_id' => function () {
                return Brand::factory()->create()->id;
            },
            'name' => $faker->words(3, true),
            'alias_sp' => $faker->slug,
            'price_new' => $faker->randomFloat(2, 10, 1000),
            'price_old' => $faker->randomFloat(2, 10, 1000),
            'image' => $faker->imageUrl(),
            'sub_image' => $faker->imageUrl(),
            'screen' => $faker->randomFloat(2, 3, 6),
            'operating_system' => $faker->randomElement(['Android', 'iOS']),
            'camera_before' => $faker->randomFloat(2, 2, 20),
            'camera_after' => $faker->randomFloat(2, 5, 50),
            'chip' => $faker->word,
            'ram' => $faker->randomElement([2, 4, 6, 8]),
            'capacity' => $faker->randomElement([32, 64, 128, 256]),
            'pin' => $faker->randomElement([3000, 4000, 5000]),
            'sim' => $faker->randomElement(['1 sim', '2 sim']),
            'quantity' => $faker->randomNumber(),
            'meeting_day' => $faker->date(),
            'hidden' => $faker->boolean,
            'description' => $faker->paragraphs(3, true),
        ];
    }
}
