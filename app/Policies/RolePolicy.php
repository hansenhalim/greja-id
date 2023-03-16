<?php

namespace App\Policies;

use App\Enums\Permission;

class RolePolicy
{
    public function viewAny($user): bool
    {
        return $user->can(Permission::VIEW_ANY_ROLES->value);
    }

    public function view($user): bool
    {
        return $user->can(Permission::VIEW_ROLES->value);
    }

    public function create($user): bool
    {
        return $user->can(Permission::CREATE_ROLES->value);
    }

    public function update($user): bool
    {
        return $user->can(Permission::UPDATE_ROLES->value);
    }

    public function delete($user): bool
    {
        return $user->can(Permission::DELETE_ROLES->value);
    }
}
