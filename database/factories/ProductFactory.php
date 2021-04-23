<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
            'title'        =>   $this->faker->word,
            'slug'         =>   $this->faker->unique()->slug,
            'photo'        =>   $this->faker->imageUrl('400', '200'),
            'status'       =>   $this->faker->randomElement(['active', 'inactive']),
            'description'  =>   $this->faker->sentences(4, true),
            'stock'        =>   $this->faker->numberBetween(2, 10),
            'brand_id'     =>   $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'vendor_id'    =>   $this->faker->randomElement(User::pluck('id')->toArray()),
            'category_id'  =>   $this->faker->numberBetween(8,10),
            'price'        =>   $this->faker->numberBetween(8,10),
            'offer_price'  =>   $this->faker->numberBetween(8,10),
            'discount'     =>   $this->faker->numberBetween(8,10),
            'size'         =>   $this->faker->randomElement(['S', 'M', 'L']),
            'condition'    =>   $this->faker->randomElement(['new', 'popular', 'winter']),
        ];
    }
}
