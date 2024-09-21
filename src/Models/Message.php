<?php

namespace Ramzi\LaraChat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Traits\ManageCustomUserModel;

class Message extends Model
{
    use ManageCustomUserModel;

    protected $table = 'messages';

    /**
     * Return the Thread related to this Message
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Return the Sender of this message
     * Configurable to use a custom Model in the config file
     * @return BelongsTo
     */
    public function sender(): BelongsTo
    {
        $customModel = $this->getLaraChatSenderModel();
        return $this->belongsTo($customModel, 'sender_id');
    }


}
