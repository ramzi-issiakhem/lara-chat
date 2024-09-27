<?php

namespace Ramzi\LaraChat\Exceptions;

class FeedOwnerModelNotFoundException extends LaraChatCustomException
{

    public function __construct($message = null, $code = null, $data = [])
    {
        parent::__construct($message ?? 'Feed Owner Model not found', $code ?? 404, $data);
    }


}
