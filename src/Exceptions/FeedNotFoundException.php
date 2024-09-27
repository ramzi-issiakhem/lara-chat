<?php

namespace Ramzi\LaraChat\Exceptions;

class FeedNotFoundException extends LaraChatCustomException
{

    public function __construct($message = null, $code = null, $data = [])
    {
        parent::__construct($message ?? 'Feed not created in the actual Feed Owner, to avoid this error, activate "auto_create_feed" in the config file.', $code ?? 404, $data);
    }


}
