<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

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
        // Blade::directive('admin', function () {
        //      return "if (".Auth::user()->admin().")";
        // });

        // Blade::directive('endadmin', function () {
        // return "endif";
        // });
        // Blade::if('env', function ($environment) {
        //     return app()->environment($environment);
        // });
    }
}