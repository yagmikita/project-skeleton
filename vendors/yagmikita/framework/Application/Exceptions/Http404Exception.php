<?php

namespace Application\Exceptions;

class Http404Exception extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 404);
    }
}