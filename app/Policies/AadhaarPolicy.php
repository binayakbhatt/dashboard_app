<?php

namespace App\Policies;

use App\Models\Aadhaar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AadhaarPolicy
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
        // Must be an Administrator, Editor or Verified user
        return $user->hasRoles(['Administrator', 'Editor', 'Verified']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Aadhaar $aadhaar)
    {
        // Same as viewAny
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
        // Must be an Administrator
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Aadhaar $aadhaar)
    {
        // Same as create
        return $this->create($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Aadhaar $aadhaar)
    {
        // Not allowed
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Aadhaar $aadhaar)
    {
        // Not allowed
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Aadhaar $aadhaar)
    {
        // Not allowed
        return false;
    }
}
