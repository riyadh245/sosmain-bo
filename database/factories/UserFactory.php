<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => $this->faker->ean13, // password
            'remember_token' => Str::random(10),
            'forename' => $this->faker->name,
            'lastname' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'professional_address' => $this->faker->secondaryAddress,
            'rpps_number' => $this->faker->isbn13,
            'hpc_picture' => $this->faker->colorName,
            'status' => $this->faker->randomElement([
                'in registration',
                'Registred',
                'Validated',
                'InActivated',
                'Deleted',
            ]),
            'picture' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
