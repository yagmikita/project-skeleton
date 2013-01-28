<?php

namespace Application\Exceptions;

class Http500Exception extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 500);
    }
}