<?php

namespace App\Policies;

use App\Models\Mo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoPolicy
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
        // User's role must be 'Administrator' or 'Editor' or 'Verified'
        return $user->hasRoles(['Administrator', 'Editor', 'Verified']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Mo $mo)
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
        // User must be 'Editor'
        if ($user->role->name === 'Editor') {
            return true;
        }
        // Otherwise decline access
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mo $mo)
    {
        // User must be 'Editor' and own the model
        if ($user->role->name === 'Editor' && $user->id === $mo->user_id) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mo $mo)
    {
        // Deletes are not allowed
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mo $mo)
    {
        // No restores are allowed
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mo $mo)
    {
        // No force deletes are allowed
        return false;
    }
}
