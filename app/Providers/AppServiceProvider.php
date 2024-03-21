<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Usuario;
use App\Observers\UserObserver;
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
       // Usuario::observe(UserObserver::class);
    }
}
