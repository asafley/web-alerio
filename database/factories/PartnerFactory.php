<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        return [
            'company' => $this->faker->company(),
            'company_uri' => $this->faker->word(),
            'logo_uri' => $this->faker->word(),
            'description' => $this->faker->text(),
            'order_num' => $this->faker->randomNumber(),
            'published_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
