<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Observers
         * */
        User::observe(UserObserver::class);

        /*
         * Bullshit CORS headers
         * */
        header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');
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
