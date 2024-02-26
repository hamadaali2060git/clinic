<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
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
        $cont = Setting::first();
        view()->share('contact', $cont);
    }
}
