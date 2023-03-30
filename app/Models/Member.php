<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Member extends Model
{
    use HasFactory, SoftDeletes, BelongsToTenant, Searchable;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_at' => 'datetime',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
