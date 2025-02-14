<?php

namespace App\Providers;

use App\Models\About;
use App\Models\CompanyProfile;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->share('content', CompanyProfile::first());
        view()->share('about_content', About::first());
    }
}
