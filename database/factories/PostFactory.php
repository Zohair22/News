<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        return [
            'body' => $this->faker->paragraphs(3, ','),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->title(),
            'category' => Category::factory(),
            'admin' => Admin::factory(),
        ];
    }
}
