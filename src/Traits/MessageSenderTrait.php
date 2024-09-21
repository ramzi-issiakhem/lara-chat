<?php

namespace Ramzi\LaraChat\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ramzi\LaraChat\Models\Message;
use Ramzi\LaraChat\Models\Participant;
use Ramzi\LaraChat\Models\Thread;

trait MessageSenderTrait
{

    /**
     * Return the  Relationship representing the List of All Messages sent by this Sender
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Return the Relationship representing the List of All Threads this Sender is participating in
     * @return HasManyThrough
     */
    public function threadsParticipating(): HasManyThrough
    {
        return $this->hasManyThrough(Thread::class, Participant::class);
    }


}

