<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "post_id" => "",
            "name" => $this->faker->name(),
            "comment" =>  $this->faker->sentence(),
        ];
    }
}
