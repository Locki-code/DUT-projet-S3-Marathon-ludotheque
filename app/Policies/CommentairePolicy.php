<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentairePolicy
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


    function delete(User $user, Commentaire $commentaire) {
        return $user->id === $commentaire->user_id;
    }

    function create(User $user) {
        return true;
    }
}
