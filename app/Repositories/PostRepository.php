<?php

namespace App\Repositories;

use App\Models\Post;
use Carbon\Carbon;

class PostRepository
{
//    public static function getTranding()
//    {
//        return Post::query()
//            ->whereBetween("created_at",
//                [Carbon::now()->subDays(7), Carbon::now()])
//            ->limit(5)
//            ->with("category")
//            ->get();
//    }

    public static function getPopular()
    {
        return Post::query()
            ->orderBy("published_at")
            ->orderBy("view")
            ->limit(5)
            ->with("category")
            ->get();
    }
    public static function getHeader()
    {
        return Post::query()
            ->orderBy("published_at")
            ->orderBy("view")
            ->limit(7)
            ->with("category")
            ->get();
    }

    public static function search(string $query)
    {
        return Post::query()->
            where("title","like","%$query%")
            ->orWhere("body","like","%$query%")
            ->with("category","author")
            ->paginate();
    }
}
