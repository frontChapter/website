<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\FestivalSite;
use App\Models\User;

class FestivalSitePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any FestivalSite');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FestivalSite $festivalSite): bool
    {
        return $user->checkPermissionTo('view FestivalSite');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create FestivalSite');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FestivalSite $festivalSite): bool
    {
        return $user->checkPermissionTo('update FestivalSite') || $user->id === $festivalSite->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FestivalSite $festivalSite): bool
    {
        return $user->checkPermissionTo('delete FestivalSite');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FestivalSite $festivalSite): bool
    {
        return $user->checkPermissionTo('restore FestivalSite');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FestivalSite $festivalSite): bool
    {
        return $user->checkPermissionTo('force-delete FestivalSite');
    }
}
