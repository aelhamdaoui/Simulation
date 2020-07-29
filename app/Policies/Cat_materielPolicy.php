<?php

namespace App\Policies;

use App\User;
use App\Cat_materiel;
use Illuminate\Auth\Access\HandlesAuthorization;

class Cat_materielPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the catMateriel.
     *
     * @param  \App\User  $user
     * @param  \App\Cat_materiel  $catMateriel
     * @return mixed
     */

    public function before($user,$ability)
    {
        if($user->is_admin)
            return true;
    }

    public function view(User $user, Cat_materiel $catMateriel)
    {
        //
    }

    /**
     * Determine whether the user can create catMateriels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the catMateriel.
     *
     * @param  \App\User  $user
     * @param  \App\Cat_materiel  $catMateriel
     * @return mixed
     */
    public function update(User $user, Cat_materiel $catMateriel)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the catMateriel.
     *
     * @param  \App\User  $user
     * @param  \App\Cat_materiel  $catMateriel
     * @return mixed
     */
    public function delete(User $user, Cat_materiel $catMateriel)
    {
        return false;
    }
}
