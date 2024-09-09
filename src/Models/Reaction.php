<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reaction extends Model
{

    protected $fillable = ['emoji'];

    public function reactionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }


}
