<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramzi\LaraChat\Facades\LaraChat;

class Feed extends Model
{

    protected $table = 'feeds';

    /**
     * Return the Relationship representing  the list of All Threads  in this Feed
     * @return HasMany
     */
    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }

    /**
     * Return the Relationship representing the FeedOwner of this Feed
     * @return BelongsTo
     */
    public function feedOwner(): BelongsTo
    {
        $modelClass = LaraChat::getFeedOwnerModel();
        return $this->belongsTo($modelClass, 'feed_owner_id');
    }


}
