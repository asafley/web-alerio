<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ServiceFactory extends Factory{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),//
'short_description' => $this->faker->text(),
'long_description' => $this->faker->text(),
'order_num' => $this->faker->randomNumber(),
'is_published' => $this->faker->boolean(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
        ];
    }
}
