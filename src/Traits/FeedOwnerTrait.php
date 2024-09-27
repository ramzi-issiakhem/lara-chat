<?php

namespace Ramzi\LaraChat\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramzi\LaraChat\Models\Feed;
use Ramzi\LaraChat\Models\Message;
use Ramzi\LaraChat\Models\Participant;
use Ramzi\LaraChat\Models\Thread;

trait FeedOwnerTrait
{

    /**
     * Return the Relationship representing Feed related to this Model
     * @return HasOne
     */
    public function feed(): HasOne
    {
        return $this->hasOne(Feed::class, 'feed_owner_id');
    }


}

