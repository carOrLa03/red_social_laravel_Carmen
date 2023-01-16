<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        $faker = Faker::create();
        $user_id = User::all('id')->random()->id;

        return [
            'user_id'=>$user_id,
            'image_path'=>'ejemplo.png',
            'description'=>fake()->sentence(12),
            'created_at'=>fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at'=>fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
