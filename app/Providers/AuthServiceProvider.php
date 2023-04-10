<?php

namespace App\Providers;

use App\Models\Basket;
use App\Models\Producer;
use App\Policies\BasketPolicy;
use App\Policies\RegisterPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Basket::class => BasketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
         * Configuration de `Gate` pour la gestion des droits d'accès des utilisateurs à certaines fonctions
         * Il est possible :
         * - soit de passer par une fonction de rappel (premier exemple)
         * - soit de passer par une classe spécifique appelée `Policy` (exemples suivants)
         * La meilleure pratique est sans doute de créerdes Policies
         */

//        Gate::define('create-basket', function (User $user, ?Basket $basket) {
//            $type = $user->typeable;
//
//            return $type instanceof Producer;
//        });
//
        /*
         * La gestion des droits d'accès est déléguée aux classes correspondantes
         */
        Gate::define('create.basket', [BasketPolicy::class, 'create']);
        Gate::define('register.profile', [RegisterPolicy::class, 'register']);
    }
}
