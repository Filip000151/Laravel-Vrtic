<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Roditelj;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoditeljPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the roditelj can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the roditelj can view the model.
     */
    public function view(User $user, Roditelj $model): bool
    {
        return true;
    }

    /**
     * Determine whether the roditelj can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the roditelj can update the model.
     */
    public function update(User $user, Roditelj $model): bool
    {
        return true;
    }

    /**
     * Determine whether the roditelj can delete the model.
     */
    public function delete(User $user, Roditelj $model): bool
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
     * Determine whether the roditelj can restore the model.
     */
    public function restore(User $user, Roditelj $model): bool
    {
        return false;
    }

    /**
     * Determine whether the roditelj can permanently delete the model.
     */
    public function forceDelete(User $user, Roditelj $model): bool
    {
        return false;
    }
}
