<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'headline_uri' => $this->faker->word(),
            'title' => $this->faker->word(),
            'subtitle' => $this->faker->word(),
            'summary' => $this->faker->text(),
            'content' => $this->faker->word(),
            'seo_title' => $this->faker->word(),
            'seo_summary' => $this->faker->text(),
            'is_headliner' => $this->faker->boolean(),
            'published_at' => Carbon::now(),
            'author_id' => $this->faker->words(),
            'author_name' => $this->faker->name(),
            'author_uri' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
