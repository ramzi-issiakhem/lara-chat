<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Feed extends Model
{

    public function feedable() :  MorphTo {
        return $this->morphTo();
    }

    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }


}
