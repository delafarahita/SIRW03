<?php

namespace Database\Factories;

use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelModelFactory extends Factory
{
    protected $model = LevelModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_level' => $this->faker->randomElement(['RW', 'RT']),
            'nama_level' => $this->faker->randomElement(['rw', 'rt']),
        ];
    }
}
