<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-produto', function ($user, $produto){
            return $user->id == $produto->user_id;
        });

        Gate::define('read-produto', function ($user, $produto){
           return $user->id == $produto->user_id;
        });

        Gate::define('delete-produto', function ($user, $produto){
            return $user->id == $produto->user_id;
        });

        /*Gate::define('read-categoria', function ($admin, $categoria){
            return $admin->id == $categoria->administrador_id;
         });
 
         Gate::define('delete-categoria', function ($admin, $categoria){
             return $admin->id == $categoria->administrador_id;
         });*/
    }
}
