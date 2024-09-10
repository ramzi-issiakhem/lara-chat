<?php

namespace Ramzi\LaraChat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Thread extends Model
{

    protected $table = 'threads';

    public function feed() : BelongsTo {
        return $this->belongsTo(Feed::class);
    }

    public function messages() : HasMany {
        return $this->hasMany(Message::class, 'thread_id');
    }

    public function userSeens() : HasMany {
        return $this->hasMany(ThreadSeen::class);
    }

    public function participants() {
        return $this->hasMany(Participant::class);
    }
}
