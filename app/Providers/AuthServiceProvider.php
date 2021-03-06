<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Models\Task' => 'App\Policies\TaskPolity',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('create', function(User $user){
        //     return $user->is_admin;
        // });

        // // Gate::define('task_create', fn(User $user) => $user->is_admin);
        // Gate::define('task_edit', fn(User $user) => $user->is_admin);
        // Gate::define('task_delete', fn(User $user) => $user->is_admin);
    }
}
