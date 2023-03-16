<?php

namespace App\Policies;

use App\Enums\Permission;

class PermissionPolicy
{
    public function viewAny($user): bool
    {
        return $user->can(Permission::VIEW_ANY_PERMISSIONS->value);
    }

    public function view($user): bool
    {
        return $user->can(Permission::VIEW_PERMISSIONS->value);
    }

    public function create($user): bool
    {
        return $user->can(Permission::CREATE_PERMISSIONS->value);
    }

    public function update($user): bool
    {
        return $user->can(Permission::UPDATE_PERMISSIONS->value);
    }

    public function delete($user): bool
    {
        return $user->can(Permission::DELETE_PERMISSIONS->value);
    }
}
