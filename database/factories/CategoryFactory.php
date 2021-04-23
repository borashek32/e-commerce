<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        =>   $this->faker->word,
            'slug'         =>   $this->faker->unique()->slug,
            'photo'        =>   $this->faker->imageUrl('100', '100'),
            'status'       =>   $this->faker->randomElement(['active', 'inactive']),
            'description'  =>   $this->faker->sentences(5, true),
        ];
    }
}
