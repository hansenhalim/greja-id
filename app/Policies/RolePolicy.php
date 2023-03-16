<?php

namespace App\Policies;

class RolePolicy
{
    public function viewAny($user): bool
    {
        return $user->can('viewAny roles');
    }

    public function view($user): bool
    {
        return $user->can('view roles');
    }

    public function create($user): bool
    {
        return $user->can('create roles');
    }

    public function update($user): bool
    {
        return $user->can('update roles');
    }

    public function delete($user): bool
    {
        return $user->can('delete roles');
    }
}
