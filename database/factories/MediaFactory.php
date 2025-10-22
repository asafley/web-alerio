<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'public_uri' => $this->faker->word(),
            'private_uri' => $this->faker->word(),
            'type' => $this->faker->word(),
            'is_public' => $this->faker->boolean(),
            'alt_text' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
