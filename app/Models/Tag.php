<?php

namespace App\Models;

use Spatie\Tags\Tag as BaseTag;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Tag extends BaseTag
{
    use BelongsToTenant;
}
