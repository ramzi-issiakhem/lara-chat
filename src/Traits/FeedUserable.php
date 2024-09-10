<?php

namespace Ramzi\LaraChat\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramzi\LaraChat\Models\Feed;
use Ramzi\LaraChat\Models\Thread;
use Ramzi\LaraChat\Models\ThreadSeen;

trait FeedUserable
{




    public function feed() : MorphOne {
        return $this->morphOne(Feed::class,'feedable');
    }



}
