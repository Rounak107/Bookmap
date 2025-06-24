<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('partials.navigation', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }

    public function register()
    {
        //
    }
}
