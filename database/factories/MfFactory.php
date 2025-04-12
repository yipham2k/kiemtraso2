<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mf;

class MfFactory extends Factory
{
    protected $model = \App\Models\Mf::class; 

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'country' => $this->faker->country(),
        ];
    }
}