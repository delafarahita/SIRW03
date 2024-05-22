<?php

namespace Database\Factories;

use App\Models\RTModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RTModelFactory extends Factory
{
    protected $model = RTModel::class;

    public function definition()
    {
        return [
            'nama_rt' => $this->faker->name,
        ];
    }
}
