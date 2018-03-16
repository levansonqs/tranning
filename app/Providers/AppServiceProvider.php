<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
use App\Model\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // View::share('url_admin', getenv('ADMIN_TEMPLATE_URL'));
        View::share('objCats', Category::where('parent_id', 0)->get()); 
        View::share('objSubCats', Category::where('parent_id', '<>', 0)->get()); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
