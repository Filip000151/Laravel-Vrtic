<?php

namespace App\Policies;

use App\Models\Dete;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the dete can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the dete can view the model.
     */
    public function view(User $user, Dete $model): bool
    {
        return true;
    }

    /**
     * Determine whether the dete can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the dete can update the model.
     */
    public function update(User $user, Dete $model): bool
    {
        return true;
    }

    /**
     * Determine whether the dete can delete the model.
     */
    public function delete(User $user, Dete $model): bool
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
     * Determine whether the dete can restore the model.
     */
    public function restore(User $user, Dete $model): bool
    {
        return false;
    }

    /**
     * Determine whether the dete can permanently delete the model.
     */
    public function forceDelete(User $user, Dete $model): bool
    {
        return false;
    }
}
