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
        $date = User::all('created_at')->where('user_id', '=', $user_id);

        return [
            'user_id'=>$user_id,
            'image_path'=>fake()->imageUrl($width = 640, $height = 480, 'dogs'),
            'description'=>fake()->sentence(12),
            'created_at'=>fake()->dateTimeBetween($date, 'now'),
            'updated_at'=>fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
