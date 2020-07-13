<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Link extends Model
{
    protected $fillable = [
        'link',
        'code',
        'expired_at',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(LinkVisit::class);
    }
}
