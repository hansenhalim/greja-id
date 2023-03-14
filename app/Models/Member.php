<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_at' => 'timestamp',
        'active' => 'boolean',
    ];
}
