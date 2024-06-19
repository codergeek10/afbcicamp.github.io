<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Blade::if('superadmin', function () {
            return Auth::check() && Auth::user()->user_type == 1;
        });

        Blade::if('admins', function () {
            return Auth::check() && Auth::user()->user_type == 2 || Auth::user()->user_type == 1;
        });

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->user_type == 2;
        });

        Blade::if('user', function () {
            return Auth::check() && Auth::user()->user_type == 3;
        });

        Blade::if('registered', function () {
            $user = Auth::user();
            return Auth::check() && $user->registrant()->exists();
        });
    }
}
