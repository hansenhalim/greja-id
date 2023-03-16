<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Member extends Model
{
    use SoftDeletes, BelongsToTenant;

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_at' => 'datetime',
        'active' => 'boolean',
    ];
}
