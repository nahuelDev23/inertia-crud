<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        return [
            "title" => $this->faker->sentence(10,true),
            "user_id" => User::all()->random()->id,
            "is_anon" => $this->faker->numberBetween(0,1),
            "category_id" => Category::all()->random()->id,
            "description" => $this->faker->text(100),
            "image" => "https://source.unsplash.com/random",
            "body" => $this->faker->text(1000),
        ];
    }
}
