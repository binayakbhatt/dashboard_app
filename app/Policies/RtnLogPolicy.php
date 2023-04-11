<?php

namespace App\Policies;

use App\Models\RtnLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RtnLogPolicy
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
        return $user->hasRole(['Administrator', 'RTN']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RtnLog $rtnLog)
    {
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
        return $user->hasRole(['Administrator','RTN']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RtnLog $rtnLog)
    {
        return $user->hasRole(['RTN']) && $user->id == $rtnLog->created_by;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RtnLog $rtnLog)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RtnLog $rtnLog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RtnLog $rtnLog)
    {
        //
    }
}
