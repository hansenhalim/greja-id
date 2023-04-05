<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Tags\HasTags;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Inventory extends Model
{
    use HasTags, SoftDeletes, HasFactory, BelongsToTenant, Searchable;

    protected $guarded = [];

    protected $casts = [
        'inbound_at' => 'datetime',
    ];
}
