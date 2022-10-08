<?php

namespace Database\Factories;

use App\Models\Comment;
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
        $parent_id=rand(1,100);
        $post_id=1;
        try {
        $post_id=Comment::find($parent_id)->post_id;

        }catch (\Exception){

        $post_id= rand(1,Post::count());
        }
        return [
            "body"=>$this->faker->paragraph(),
            "user_id"=>rand(1, User::count()),
            "post_id"=>$post_id,
            "parent_id"=>$parent_id,
        ];
    }
}
