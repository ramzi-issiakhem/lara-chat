<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Participant extends Model
{

    protected $table = 'participants';
    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }

    public function participantable() : morphTo {
        return $this->morphTo();
    }

}
