<?php

namespace App\Policies;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AcademyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Academy $academy): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Academy $academy): bool
    {
        return $user->id === $academy->user_id; //Verifica que el id del usuario y el id de usario de la academia sean iguales
    }

    public function delete(User $user, Academy $academy): bool
    {
        return $user->id === $academy->user_id; //Verifica que el id del usuario y el id de usario de la academia sean iguales
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Academy $academy): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Academy $academy): bool
    {
        return false;
    }
}
