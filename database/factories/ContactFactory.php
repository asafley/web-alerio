<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'company' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'subject' => $this->faker->word(),
            'body' => $this->faker->word(),
            'user_agent' => $this->faker->word(),
            'ip_address' => $this->faker->ipv4(),
            'geo_json' => $this->faker->word(),
            'is_addressed' => $this->faker->boolean(),
            'is_emailed' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
