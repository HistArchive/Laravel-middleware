<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =  Product::class;
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'description'=>fake()->sentence(3,false),
            'descriptionlong'=>fake()->text(),
            'price'=>fake()->randomFloat(4,0,1000),
            'category_id'=>fake()->numberBetween(1,5)
        ];  
      }
}
