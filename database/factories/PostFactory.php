<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
		
		return [
			'title' => $name,
			'slug' => Str::slug($name),
			'description' => $this->faker->paragraph,
			'image_path' =>  $this->faker->imageUrl($width = 640,$height = 400),
			'user_id' => 1
        ];
    }
}
