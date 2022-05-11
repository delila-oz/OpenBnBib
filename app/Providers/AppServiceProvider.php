<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('de_DE');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Localization Carbon
        Carbon::setLocale('de');
        //https://medium.com/geekculture/laravel-v8-authentication-for-user-and-admin-using-middleware-f14171aa4efa
        Schema::defaultStringLength(191);
    }
}
