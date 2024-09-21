<?php

namespace Ramzi\LaraChat\Exceptions;

class UnauthorizedFeedAccessException extends LaraChatCustomException
{

    public function __construct($message = null, $code = null, $data = [])
    {
        parent::__construct($message ?? "You don't have access to this Feed", $code ?? 403, $data);
    }


}
