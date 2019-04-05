<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

use App\Category;

use App\Subcategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
       View::composer('frontEnd.includes.menu',function ($view){
           $publishedCategories = Category::with(['subcategories'])
                                        ->where('publicationStatus', 1)
                                           ->get();
            $view->with('publishedCategories',$publishedCategories);

            
            // $publishedSubCategories = Subcategory::where('publicationStatus', 1)->get();
            // $view->with('publishedSubCategories',$publishedSubCategories);
        });
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
