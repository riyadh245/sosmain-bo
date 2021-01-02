<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->lastname,
            'forename' => $this->faker->firstName,
            'date_of_birth' => $this->faker->date,
            'social_number' => $this->faker->ean13,
            'hic_picture' => $this->faker->image,
            'tm_advices' => $this->faker->ean8,
        ];
    }
}
