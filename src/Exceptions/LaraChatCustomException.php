<?php

namespace Ramzi\LaraChat\Exceptions;

use Exception;

abstract class LaraChatCustomException extends Exception
{
    /**
     * The exception message.
     *
     * @var string
     */
    protected $message = 'An error occurred';

    /**
     * The exception code.
     *
     * @var int
     */
    protected $code = 500;

    /**
     * The exception data.
     *
     * @var array
     */
    protected $data = [];


    /**
     * Create a new exception instance.
     *
     * @param string $message
     * @param int $code
     * @param array $data
     */
    public function __construct($message = null, $code = null, $data = [])
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);

        $this->data = $data;
    }

    /**
     * Get the exception data.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
