<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BrandVendor;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandVendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BrandVendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id'     =>   $this->faker->numberBetween(1,10),
            'vendor_id'    =>   $this->faker->numberBetween(1,50),
        ];
    }
}
