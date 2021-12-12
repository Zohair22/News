<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Admin;
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
            'body' => $this->faker->paragraph(),
            'user_id' => Admin::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
