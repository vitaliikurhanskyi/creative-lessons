<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'title' => Str::random(rand(7, 10)),
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text(300),
            'image' => $this->faker->imageUrl,
            'likes' => rand(1, 100),
            'is_published' => rand(0, 1),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
