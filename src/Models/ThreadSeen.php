<?php

namespace Ramzi\LaraChat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Traits\ManageCustomUserModel;

class ThreadSeen extends Model
{
    use ManageCustomUserModel;

    protected $table = 'threads_seen';

    /**
     * Return the Relationship representing the Thread related to this ThreadSeen
     * @return BelongsTo
     */
    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Return the Relationship representing the Sender Model related to this ThreadSeen
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        $userModel = $this->getLaraChatSenderModel();
        return $this->belongsTo($userModel, "sender_id");
    }

    /**
     * Return the Relationship representing the Last Message seen
     * @return BelongsTo
     */
    public function lastSeenMessage(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'last_seen_message_id');
    }
}
