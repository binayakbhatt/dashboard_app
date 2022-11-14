<?php

namespace App\Policies;

use App\Models\Ranking;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RankingPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ranking $ranking)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // Only admin can create ranking
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ranking $ranking)
    {
        // Only admin can update ranking
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ranking $ranking)
    {
        // Only admin can delete ranking
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ranking $ranking)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ranking $ranking)
    {
        //
    }
}
