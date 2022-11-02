<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Location;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $categoriesGlobal = Category::select('id','name','slug')->get();
            $categoriesGlobalSidebar = Category::select('id','name','slug')->withCount('room')->get();
            $articlesNew = Article::orderByDesc('id')->limit(5)->get();
            $locationsCity = Location::where('parent_id', 0)->select('id','name')->get();
        }catch (\Exception $exception){

        }
        \View::share('categoriesGlobal', $categoriesGlobal ?? []);
        \View::share('categoriesGlobalSidebar', $categoriesGlobalSidebar ?? []);
        \View::share('articlesNew', $articlesNew ?? []);
        \View::share('locationsCity', $locationsCity ?? []);
    }
}
