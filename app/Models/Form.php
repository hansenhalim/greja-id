<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Form extends Model implements HasMedia
{
    use HasTags, InteractsWithMedia, SoftDeletes, HasFactory, BelongsToTenant;

    protected $guarded = [];

    protected $casts = [
        'content' => 'json',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documents');
    }
}
