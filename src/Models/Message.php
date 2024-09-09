<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{


    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    public function messageable() {
        return $this->morphTo();
    }


    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

}
