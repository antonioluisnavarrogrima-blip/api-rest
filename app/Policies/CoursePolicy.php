<?php

namespace App\Policies;

use App\Models\Cours;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
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
    public function view(User $user, Cours $cours): bool
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
    public function update(User $user, Course $course, ?Academy $newAcademy = null): bool
    {
        if ($user->id !== $course->academy->user_id) { //Si el id del usuario no coincide con el id del usuario dueño de academy de ese curso
            return false;
        }
        if ($newAcademy && $user->id !== $newAcademy->user_id) { //Si le pasamos una nueva academia y no soy el dueño
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return $user->id === $course->academy->user_id;
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cours $cours): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cours $cours): bool
    {
        return false;
    }
}
