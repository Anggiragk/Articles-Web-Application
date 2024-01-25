<?php

namespace Database\Factories;

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
        $randNumber = mt_rand(1000, 9999);
        return [
            'title' => "Article $randNumber",
            'slug' => "article_$randNumber",
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(mt_rand(6,10)),
            'category_id' => mt_rand(1,4),
            'author_id' => 1
        ];
    }
}
