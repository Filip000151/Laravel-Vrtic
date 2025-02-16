<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Grupa;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the grupa can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the grupa can view the model.
     */
    public function view(User $user, Grupa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the grupa can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the grupa can update the model.
     */
    public function update(User $user, Grupa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the grupa can delete the model.
     */
    public function delete(User $user, Grupa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the grupa can restore the model.
     */
    public function restore(User $user, Grupa $model): bool
    {
        return false;
    }

    /**
     * Determine whether the grupa can permanently delete the model.
     */
    public function forceDelete(User $user, Grupa $model): bool
    {
        return false;
    }
}
