<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\UserAttribute;
use App\Models\User;

class UserAttributePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any UserAttribute');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserAttribute $userattribute): bool
    {
        return $user->checkPermissionTo('view UserAttribute');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create UserAttribute');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserAttribute $userattribute): bool
    {
        return $user->checkPermissionTo('update UserAttribute');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserAttribute $userattribute): bool
    {
        return $user->checkPermissionTo('delete UserAttribute');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserAttribute $userattribute): bool
    {
        return $user->checkPermissionTo('restore UserAttribute');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserAttribute $userattribute): bool
    {
        return $user->checkPermissionTo('force-delete UserAttribute');
    }
}
