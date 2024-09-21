<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ramzi\LaraChat\Traits\ManageCustomUserModel;

class Thread extends Model
{
    use ManageCustomUserModel;

    protected $table = 'threads';

    /**
     * Return the Relationship representing the Feed related to this Thread
     * @return BelongsTo
     */
    public function feed() : BelongsTo {
        return $this->belongsTo(Feed::class);
    }

    /**
     * Return the Relationship representing the List of All Messages sent in this Thread
     * @return HasMany
     */
    public function messages() : HasMany {
        return $this->hasMany(Message::class);
    }

    /**
     * Return the Relationship representing the List of All Senders participating in this Thread
     * @return hasManyThrough
     */
    public function participants(): hasManyThrough
    {
        $modelClass = $this->getLaraChatSenderModel();
        return $this->hasManyThrough($modelClass, Participant::class, 'thread_id', 'id', 'id', 'sender_id');
    }

}
