<?php

namespace App\Policies;

use App\Models\Basket;
use App\Models\Producer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasketPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Règle d'accès pour la création d'un panier
     * En l'occurrence cette fonctionnalité est réservée au producteurs
     * Nous utilisons les ressources des associations polymorphes pour unifier la procédure
     *
     * @param User $user
     * @param Basket|null $basket
     * @return bool
     */
    public function create(User $user, ?Basket $basket = null): bool
    {
        /*
         * La propriété (virtuelle) polymorphe `typeable` renvoie soit un `Client`, soit un `Producer`
         */
        $type = $user->typeable;

        return $type instanceof Producer;
    }
}
