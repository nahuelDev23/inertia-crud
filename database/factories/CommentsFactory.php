<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "comment" => $this->faker->sentence(150,true),
            "user_id" => User::all()->random()->id,
            "post_id" => Post::all()->random()->id,
            "image" => "https://source.unsplash.com/random",
        ];
    }
}
