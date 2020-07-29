<?php

namespace App\Policies;

use App\User;
use App\Formation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */

    public function before($user,$ability)
    {
        if($user->is_admin)
            return true;
    }
    public function view(User $user, Formation $formation)
    {
        if($user->id === $formation->user_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can create formations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function update(User $user, Formation $formation)
    {
        if($user->id === $formation->user_id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function delete(User $user, Formation $formation)
    {
        if($user->id === $formation->user_id)
            return true;
        else
            return false;
    }
}
