<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisterPolicy
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
     * Un utilisateur n'estautorisé à créer un compte que s'il n'est pas connecté à l'application
     *
     * @param User|null $user
     * @return bool
     */
    public function register(?User $user = null) {

        return ($user instanceof User);
    }
}
