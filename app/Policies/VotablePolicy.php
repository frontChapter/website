<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Votable;
use App\Models\User;

class VotablePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Votable');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Votable $votable): bool
    {
        return $user->checkPermissionTo('view Votable');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Votable');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Votable $votable): bool
    {
        return $user->checkPermissionTo('update Votable');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Votable $votable): bool
    {
        return $user->checkPermissionTo('delete Votable');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Votable $votable): bool
    {
        return $user->checkPermissionTo('restore Votable');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Votable $votable): bool
    {
        return $user->checkPermissionTo('force-delete Votable');
    }
}
