<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Pastikan ini mengarah ke model User yang benar
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        // Definisikan gate dengan model User yang benar
        Gate::define('admin/user', function (User  $user) {
            return $user->role === 'admin' || $user->role === 'user';
        });

        Gate::define('user', function (User  $user) {
            return $user->role === 'user';
        });

        Gate::define('admin', function (User  $user) {
            return $user->role === 'admin';
        });
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
