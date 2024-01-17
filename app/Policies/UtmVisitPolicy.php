<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\UtmVisit;
use App\Models\User;

class UtmVisitPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any UtmVisit');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UtmVisit $utmvisit): bool
    {
        return $user->checkPermissionTo('view UtmVisit');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UtmVisit $utmvisit): bool
    {
        return $user->checkPermissionTo('update UtmVisit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UtmVisit $utmvisit): bool
    {
        return $user->checkPermissionTo('delete UtmVisit');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UtmVisit $utmvisit): bool
    {
        return $user->checkPermissionTo('restore UtmVisit');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UtmVisit $utmvisit): bool
    {
        return $user->checkPermissionTo('force-delete UtmVisit');
    }
}
