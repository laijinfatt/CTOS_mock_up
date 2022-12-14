<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';
    const AGENT = 'agent';
    const MEMBER = 'member';

    public function admin(User $user): bool
    {
        return $user->isAdmin();
    }

    public function agent(User $user): bool
    {
        return $user->isAgent();
    }

    public function member(User $user): bool
    {
        return $user->isMember();
    }
}
