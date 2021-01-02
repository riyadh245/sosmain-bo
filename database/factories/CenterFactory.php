<?php

namespace Database\Factories;

use App\Models\Center;
use Illuminate\Database\Eloquent\Factories\Factory;

class CenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Center::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'logo' => $this->faker->company,
            'website' => $this->faker->domainName,
            'address' => $this->faker->address,
            'longitude' => $this->faker->longitude($min = -180, $max = 180),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
        ];
    }
}
