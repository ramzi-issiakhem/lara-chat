<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{


    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    public function messageable(): MorphTo
    {
        return $this->morphTo();
    }


    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

}
