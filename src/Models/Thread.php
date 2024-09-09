<?php

namespace Ramzi\LaraChat\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $table = 'threads';

    public function messages() {
        return $this->hasMany(Message::class, 'thread_id');
    }
}
