<?php

namespace Application\Exceptions;

class TypeException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 501);
    }
}