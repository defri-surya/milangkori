<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('isPengelolawisata', function ($user) {
            return $user->role == 'pengelolawisata';
        });

        Gate::define('isCustomer', function ($user) {
            return $user->role == 'customer';
        });
    }
}
