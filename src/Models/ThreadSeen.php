<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ThreadSeen extends Model
{

    protected $table = 'thread_seens';
    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }

    public function seenable() : morphTo {
        return $this->morphTo();
    }

    public function lastMessageSeen() : BelongsTo {
        return $this->belongsTo(Message::class, 'last_message_seen_id');
    }

}
