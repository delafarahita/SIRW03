<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserModelFactory extends Factory
{
    protected $model = UserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_level' => \App\Models\LevelModel::factory(), // Assuming LevelModel also has a factory
            'nama_user' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password'), // or use Hash::make('password')
        ];
    }
}
