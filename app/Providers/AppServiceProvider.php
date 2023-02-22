<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Repositories\Interfaces\CategoryIR;
Use App\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryIR::class,CategoryRepository::class);
        $this->app->bind(\App\Repositories\Interfaces\PostIR::class, \App\Repositories\PostRepository::class);
        $this->app->bind(AdminIR::class, AdminRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share('recent_posts',\App\Models\Post::orderBy('id','desc')->limit(5)->get());
    }
}
