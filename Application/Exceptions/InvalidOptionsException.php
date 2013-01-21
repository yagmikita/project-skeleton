<?php

namespace Application\Exceptions;

class InvalidOptionsException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 502);
    }
}