<?php

namespace Iamjaime\Credits;

use Illuminate\Support\ServiceProvider;

class UserCreditServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //load up the migrations...
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
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
