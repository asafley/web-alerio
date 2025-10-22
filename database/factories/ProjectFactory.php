<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'company' => $this->faker->company(),
            'company_uri' => $this->faker->word(),
            'summary' => $this->faker->text(),
            'content' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'published_at' => Carbon::now(),
            'is_headliner' => $this->faker->boolean(),
            'order_num' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
