<?php

namespace Ramzi\LaraChat\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ramzi\LaraChat\Facades\LaraChat;
use Ramzi\LaraChat\Models\Message;
use Ramzi\LaraChat\Models\Participant;
use Ramzi\LaraChat\Models\Thread;

trait ManageCustomUserModel
{

    /**
     * Return the  Sender Model Class to be used in the relationships
     * @return string
     */
    public function getLaraChatSenderModel(): string
    {
        return LaraChat::getSenderModel();
    }


}

