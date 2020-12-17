<?php

namespace App\Policies;

use App\Models\Achat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchatPolicy
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

    // ...
    function update(User $user, Achat $achat) {
        return $user->id === $achat->user_id;
    }

    function delete(User $user, Achat $achat) {
        return $user->id === $achat->user_id;
    }

    function create(User $user) {
        return true;
    }
}
