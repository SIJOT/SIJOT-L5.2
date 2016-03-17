<?php

namespace App\Providers;

use App\Rental;
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
        // Rental global variables
        view()->share('rentalCount', Rental::all()->count());
        view()->share('rentalOption', Rental::where('Status', 1)->count());
        view()->share('rentalNew', Rental::where('Status', 0)->count());
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
