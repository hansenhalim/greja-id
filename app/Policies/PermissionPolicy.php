<?php

namespace App\Policies;

class PermissionPolicy
{
    public function viewAny($user): bool
    {
        return $user->can('viewAny permissions');
    }

    public function view($user): bool
    {
        return $user->can('view permissions');
    }

    public function create($user): bool
    {
        return $user->can('create permissions');
    }

    public function update($user): bool
    {
        return $user->can('update permissions');
    }

    public function delete($user): bool
    {
        return $user->can('delete permissions');
    }
}
