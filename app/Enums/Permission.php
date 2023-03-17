<?php

namespace App\Enums;

enum Permission: string
{
    case VIEW_ANY_ROLES = 'viewAny roles';
    case VIEW_ROLES = 'view roles';
    case CREATE_ROLES = 'create roles';
    case UPDATE_ROLES = 'update roles';
    case DELETE_ROLES = 'delete roles';

    case VIEW_ANY_PERMISSIONS = 'viewAny permissions';
    case VIEW_PERMISSIONS = 'view permissions';
    case CREATE_PERMISSIONS = 'create permissions';
    case UPDATE_PERMISSIONS = 'update permissions';
    case DELETE_PERMISSIONS = 'delete permissions';

    case VIEW_TELESCOPE = 'view telescope';
    case VIEW_HORIZON = 'view horizon';
}
