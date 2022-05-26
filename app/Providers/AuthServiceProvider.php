<?php

namespace App\Providers;

use App\Nft;
use App\Operation;
use App\Role;
use App\User;
use App\Policies\NftPolicy;
use App\Policies\OperationPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
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
        Nft::class => NftPolicy::class,
        //Operation::class => OperationPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
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

        //Gate::define('shop-nft', 'App\Policies\ShopPolicy@viewAny');

        

        //
    }
}
