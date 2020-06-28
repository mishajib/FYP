<?php

namespace App\Providers;

use App\Console\Commands\ModelMakeCommand;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.frontend.app', function ($view) {
            $view->with('categories', Category::with('children')->with('parent')->latest()->get());
        });
        view()->composer('layouts.frontend.app', function ($view) {
            $view->with('recentPosts', Post::with('categories')->approved()->published()->latest()->take(6)->get());
        });
    }
}
