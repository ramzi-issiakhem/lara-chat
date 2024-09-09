<?php

namespace Ramzi\LaraChat\Traits;

use Ramzi\LaraChat\Models\Message;
use Ramzi\LaraChat\Models\Reaction;

trait MessageUserable
{

    public function messages() {
        return $this->morphMany(Message::class,'messageable');
    }

    public function reactions() {
        return $this->morphMany(Reaction::class, 'reactionable');;
    }


}
