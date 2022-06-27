<?php

namespace App\Providers;

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
        //Practice::class => PracticePolicy::class,
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
        Gate::before(function($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });

/*         Gate::define('edit-applicant', 'App\Policies\ApplicantPolicy@update');
        Gate::define('edit-practice', 'App\Policies\PracticePolicy@update');
        Gate::define('edit-subject', 'App\Policies\SubjectPolicy@update');
        Gate::define('edit-building', 'App\Policies\BuildingPolicy@update');
        Gate::define('edit-superbonus', 'App\Policies\SuperbonusPolicy@view');

 */        Passport::routes();
    }
}
