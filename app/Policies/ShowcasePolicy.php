<?php

namespace App\Policies;

use App\User;
use App\Showcase;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShowcasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function updateDelete(User $user, Showcase $showcase) {
        return $user->id === $showcase->author_id;
    }

    public function create(User $user) {
        //
    }
}
