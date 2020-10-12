<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('list-user', function ($user) {
            return $user->list11('12');
        });

        Gate::define('create-user', function ($user) {
            return $user->create11('9');
        });
        Gate::define('xoa-user', function ($user) {
            return $user->delete11('11');
        });

        Gate::define('sua-user', function ($user) {
            return $user->update11('10');
        });
    }
}
