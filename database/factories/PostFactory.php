<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        return [

            "category_id" => "",
            "user_id" => "",
            "title" => $title,
            "slug" => Str::slug($title),
            "image800x549" => "assets/storage/uploads/posts/800x549/image-1639738263IMG_6732.JPG",
            "image800x1166" => "assets/storage/uploads/posts/800x1166/image-1639738263IMG_6732.JPG",
            "content" => $this->faker->text(),
            "published_at" => now(),
            "deleted_by" => "", //my deleted by cant be null
            "status" => 1,
        ];
    }
}
