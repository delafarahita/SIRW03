<?php

namespace Database\Factories;

use App\Models\KKModel;
use App\Models\RTModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class KKModelFactory extends Factory
{
    protected $model = KKModel::class;

    public function definition()
    {
        return [
            'no_kk' => 1234567890123456,
            'kepala_keluarga' => $this->faker->name,
        ];
    }
    // public function withGeneratedNoKK()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'no_kk' => $this->faker->unique()->numerify('################'),
    //         ];
    //     });
    // }
}
