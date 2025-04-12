<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Mf;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $array = [
           'hinh1.png',
           'hinh2.png',
           'hinh3.png',
           'hinh4.png',
           

        ];

        return [
            'description' => fake()->company(),
            'model' => fake()->bothify('?????-#####'),
            'product_on' => now(),
            'mf_id' =>  Mf::inRandomOrder()->first()->id,
            'image' => fake()->randomElement($array)
        ];
    }
}