<?php

namespace App\Models;

use Advoor\NovaEditorJs\NovaEditorJsCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Feed extends Model implements HasMedia
{
    use HasTags, InteractsWithMedia, HasFactory, SoftDeletes, BelongsToTenant;

    protected $guarded = [];

    protected $casts = [
        'content' => NovaEditorJsCast::class,
    ];
}
