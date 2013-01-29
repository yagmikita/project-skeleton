<?php

namespace Types;

use Traits as T,
    Prototypes\Abstracts as A,        
    Prototypes\Interfaces as I,
    Application\Exceptions as E;

class TInt extends A\TypeAbstract
{   
    public function __construct($value)
    {
        parent::__construct($value, 0);
    }
    
    public function isValidType($value)
    {
        return is_int($value);
    }
    
}