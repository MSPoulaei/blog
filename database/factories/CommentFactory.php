<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "body"=>$this->faker->paragraph(),
            "user_id"=>rand(1, User::count()),
            "post_id"=>rand(1, Post::count()),
            "parent_id"=>rand(1,100),
        ];
    }
}
