<?php

namespace Ramzi\LaraChat\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Ramzi\LaraChat\Models\Message;
use Ramzi\LaraChat\Models\Participant;
use Ramzi\LaraChat\Models\Reaction;
use Ramzi\LaraChat\Models\ThreadSeen;

trait MessageUserable
{

    public function messages() {
        return $this->morphMany(Message::class,'messageable');
    }

    public function reactions() {
        return $this->morphMany(Reaction::class, 'reactionable');;
    }

    public function threadSeens(): MorphMany
    {
        return $this->morphMany(ThreadSeen::class, 'seenable');
    }

    public function threadsParticipant(): MorphMany
    {
        return $this->morphMany(Participant::class,'participantable');
    }

}
