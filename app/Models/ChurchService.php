<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class ChurchService extends Model
{
    use HasTags, HasFactory, SoftDeletes, BelongsToTenant;

    protected $guarded = [];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function churchLocation()
    {
        return $this->belongsTo(ChurchLocation::class);
    }

    public function tithes()
    {
        return $this->hasMany(Tithe::class);
    }
}
