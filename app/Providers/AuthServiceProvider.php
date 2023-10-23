<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     *
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('ketua', function ($user) {
            return $user->status == 'Ketua';
        });
        Gate::define('bendahara', function ($user) {
            return $user->status == 'Bendahara';
        });
        Gate::define('akuntan', function ($user) {
            return $user->status == 'Akuntan';
        });
    }
}
