<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->unique()->text(20);
        $body=$this->faker->realText(500);
        return [
            "title"=>$title,
            "slug"=>Str::slug($title),
            "description"=>substr($body,0, min(50,strlen($body))),
            "body"=>$body,
            "published_at"=>now(),
            "category_id"=>rand(1, Category::count()),
            "user_id"=>rand(1, User::count()),
            "view"=>random_int(0,200),
        ];
    }
}
