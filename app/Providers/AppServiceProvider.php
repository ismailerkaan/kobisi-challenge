<?php

namespace App\Providers;

use App\Models\Companies;
use App\Observers\CompaniesObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Companies::observe(CompaniesObserver::class);
        Schema::defaultStringLength(191);
    }
}
