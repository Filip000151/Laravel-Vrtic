<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Evidencija;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvidencijaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the evidencija can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the evidencija can view the model.
     */
    public function view(User $user, Evidencija $model): bool
    {
        return true;
    }

    /**
     * Determine whether the evidencija can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the evidencija can update the model.
     */
    public function update(User $user, Evidencija $model): bool
    {
        return true;
    }

    /**
     * Determine whether the evidencija can delete the model.
     */
    public function delete(User $user, Evidencija $model): bool
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
     * Determine whether the evidencija can restore the model.
     */
    public function restore(User $user, Evidencija $model): bool
    {
        return false;
    }

    /**
     * Determine whether the evidencija can permanently delete the model.
     */
    public function forceDelete(User $user, Evidencija $model): bool
    {
        return false;
    }
}
