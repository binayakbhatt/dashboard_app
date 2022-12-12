<?php

namespace App\Policies;

use App\Models\Byod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ByodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // User's role must be 'Administrator' or 'Editor' or 'Verified' or 'Byod'
        return $user->hasRole(['Administrator', 'Editor', 'Verified', 'Byod']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Byod $byod)
    {
        // same as viewAny()
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // User must be 'Byod'
        if ($user->hasRole(['Byod', 'Administrator'])) {
            return true;
        }
        // Otherwise decline access
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Byod $byod)
    {
        // User must be 'Byod' and the user_id must be the same
        if ($user->hasRole(['Byod']) && $user->id == $byod->user_id) {
            return true;
        }

        // Otherwise decline access
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Byod $byod)
    {
        //  Not implemented
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Byod $byod)
    {
        // Not implemented
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Byod $byod)
    {
        // Not implemented
        return false;
    }
}
