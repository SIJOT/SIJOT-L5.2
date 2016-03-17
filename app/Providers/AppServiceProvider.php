<?php

namespace App\Providers;

use Bouncer;
use App\Rental;
use Illuminate\Support\Facades\Schema;
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
        // Role seed.
        Bouncer::seeder(function () {
            Bouncer::allow('active')->to('');
            Bouncer::allow('blocked')->to('');
            Bouncer::allow('admin')->to('');

            // Takken.
            Bouncer::allow('kapoenen')->to('');
            Bouncer::allow('welpen')->to('');
            Bouncer::allow('jong-givers')->to('');
            Bouncer::allow('givers')->to('');
            Bouncer::allow('jins')->to('');
            Bouncer::allow('leiding')->to('');
            Bouncer::allow('groepsleiding')->to('');
        });

        // Rental global variables
        if (Schema::hasTable('rentals')) {
            view()->share('rentalCount', Rental::all()->count());
            view()->share('rentalOption', Rental::where('Status', 1)->count());
            view()->share('rentalNew', Rental::where('Status', 0)->count());
        }
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
