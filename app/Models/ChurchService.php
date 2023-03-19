<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class ChurchService extends Model
{
    use HasFactory, SoftDeletes, BelongsToTenant;

    protected $guarded = [];

    public function churchLocation()
    {
        return $this->belongsTo(ChurchLocation::class);
    }
}
