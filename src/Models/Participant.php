<?php

namespace Ramzi\LaraChat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramzi\LaraChat\Traits\ManageMessageSenderModel;

class Participant extends Model
{

    use ManageMessageSenderModel;

    protected $table = 'participants';

    /**
     * Return the Relationship representing the Thread related to this Participant
     * @return BelongsTo
     */
    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Return the Relationship representing the Sender Model related to this Participant
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        $modelClass = $this->getLaraChatSenderModel();
        return $this->belongsTo($modelClass, "sender_id");
    }
}
