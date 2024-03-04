<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Location;
use App\Models\OptionItems;
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
            $optionItems = OptionItems::select('id','name')->where('status', 1)->get();
            $categoriesGlobalSidebar = Category::select('id','name','slug')->withCount('room')->get();
            $articlesNew = Article::orderByDesc('id')->limit(5)->get();
            $locationsCity = Location::where('parent_id', 0)->select('id','name')->get();
        }catch (\Exception $exception){

        }
        \View::share('categoriesGlobal', $categoriesGlobal ?? []);
        \View::share('optionItems', $optionItems ?? []);
        \View::share('categoriesGlobalSidebar', $categoriesGlobalSidebar ?? []);
        \View::share('articlesNew', $articlesNew ?? []);
        \View::share('locationsCity', $locationsCity ?? []);
    }
}
