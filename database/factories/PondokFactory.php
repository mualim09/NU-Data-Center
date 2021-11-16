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
            'nama' => 'PP. ' . $this->faker->titleMale(),
            'alamat' => $this->faker->address(),
            'alamat_maps' => $this->faker->latitude() . '|' . $this->faker->longitude()
        ];
    }
}
