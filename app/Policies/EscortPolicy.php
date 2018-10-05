<?php

namespace App\Policies;

use App\User;
use App\Models\Escort;
use Illuminate\Auth\Access\HandlesAuthorization;

class EscortPolicy
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

    public function pass(User $user, Escort $escort)
    {
      return $user->id == $escort->user_id;
    }
}
