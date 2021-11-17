<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PondokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => 'PP. ' . $this->faker->firstName() . ' ' . $this->faker->lastName() . ' ' . $this->faker->city(),
            'alamat' => $this->faker->address(),
            'alamat_maps' => $this->faker->latitude() . '|' . $this->faker->longitude()
        ];
    }
}
