<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkVisit extends Model
{
    protected $fillable = ['link_id', 'showed_picture'];

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
