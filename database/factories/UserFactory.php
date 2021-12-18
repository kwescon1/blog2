<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Kwesi Odame",
            'username' => $this->faker->unique()->word(),
            'password' => Hash::make("1212345"), // password
            'remember_token' => Str::random(10),
            'email' => $this->faker->unique()->email(),
            'instagram' => $this->faker->unique()->word() . "/instagram.com",
            'linkedIn' => $this->faker->unique()->word() . "linkedin.com",
            'twitter' => $this->faker->unique()->word() . "twitter.com",
            'mission' => "To democratize programming. Simplicity over complexity. The truth and nothing but the truth",
            "image665x665" => "assets/storage/uploads/users/665x665/image-1639771199wallpapersden.com_thorfinn-in-vinland-saga_1920x1080.jpg"
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
