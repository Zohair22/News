<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
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
            'slug' => $this->faker->unique()->slug(),
            'title' => $this->faker->words(5, ' '),
            'excerpt' => $this->faker->paragraph(),
            'category_id' => Category::factory(),
            'admin_id' => Admin::factory(),
        ];
    }
}
