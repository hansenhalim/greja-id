<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Spatie\Tags\Tag as BaseTag;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Tag extends BaseTag
{
    use BelongsToTenant, Searchable;
}
