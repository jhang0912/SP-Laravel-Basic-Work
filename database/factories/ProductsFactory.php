<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cht_name' => 'test_cht_name_' . $this->faker->unique()->numberBetween($min = 1, $max = 1000000),
            'en_name' => 'test_en_name_' . $this->faker->unique()->numberBetween($min = 1, $max = 1000000),
            'mvp' => $this->faker->numberBetween($min = 0, $max = 1),
            'content' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'equipment' => $this->faker->word(),
            'price' => $this->faker->numberBetween($min = 100, $max = 100000),
            'quantity' => 100
        ];
    }
}
