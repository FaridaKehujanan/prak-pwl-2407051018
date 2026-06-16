<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPolicies();

        Paginator::useBootstrapFive();

        Gate::define('view-users', function ($user) {
            return $user->hasRole('dosen');
        });

        Gate::define('create-users', function ($user) {
            return $user->hasRole('dosen');
        });

        Gate::define('update-users', function ($user) {
            return $user->hasRole('dosen');
        });

        Gate::define('delete-users', function ($user) {
            return $user->hasRole('dosen');
        });
    }
}