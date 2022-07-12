<?php

namespace App\Providers;

use App\ComputoPriceList;
use App\Folder;
use App\Policies\FolderManagementPolicy;
use App\Policies\PriceListPolicy;
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
		Folder::class => FolderManagementPolicy::class,
		ComputoPriceList::class => PriceListPolicy::class,
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
