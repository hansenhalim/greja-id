<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Tithe extends Model
{
    use HasTags, HasFactory, SoftDeletes, BelongsToTenant;

    public function churchService()
    {
        return $this->belongsTo(ChurchService::class);
    }
}
