<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomElement([500, 1200, 1500, 2000, 3000, 2500, 4000, 5000, 8000, 3500, 4800, 6000, 10000]),
            'email' => $this->faker->unique()->safeEmail,
            'description' => $this->faker->realText(),
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
