<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("layouts.layout",function ($view){
           $view->with([
               "categories"=>Category::all(),
               "date"=>Carbon::now(),
//               "trandingPosts"=>PostRepository::getTranding()
                "popularPosts"=>PostRepository::getPopular()
           ]);
        });
    }
}
