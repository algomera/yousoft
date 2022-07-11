<?php

namespace App\Providers;

use App\Policies\PracticePolicy;
use App\Practice;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Practice::class => PracticePolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Grant "admin" role all permissions
        Gate::before(function($user) {
            return $user->isAdmin() ? true : null;
        });

		Passport::routes();
    }
}
