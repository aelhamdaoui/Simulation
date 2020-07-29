<?php

namespace App\Policies;

use App\User;
use App\Type_participant;
use Illuminate\Auth\Access\HandlesAuthorization;

class Type_participantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the typeParticipant.
     *
     * @param  \App\User  $user
     * @param  \App\Type_participant  $typeParticipant
     * @return mixed
     */

    public function before($user,$ability)
    {
        if($user->is_admin)
            return true;
    }

    public function view(User $user, Type_participant $typeParticipant)
    {
        //
    }

    /**
     * Determine whether the user can create typeParticipants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the typeParticipant.
     *
     * @param  \App\User  $user
     * @param  \App\Type_participant  $typeParticipant
     * @return mixed
     */
    public function update(User $user, Type_participant $typeParticipant)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the typeParticipant.
     *
     * @param  \App\User  $user
     * @param  \App\Type_participant  $typeParticipant
     * @return mixed
     */
    public function delete(User $user, Type_participant $typeParticipant)
    {
        return false;
    }
}
