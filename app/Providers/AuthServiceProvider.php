<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Permission::all()->each(function ($permission) {
            Gate::define($permission->access_module_name, function ($user) use ($permission) {
                return optional($user->role)
                    ->permissions
                    ->pluck('access_module_name')
                    ->contains($permission->access_module_name);
            });
        });
    }
}
