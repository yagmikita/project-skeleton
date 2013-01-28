<?php

namespace Validators;

use Types,
    Prototypes\Abstracts as Abs;

class isCreditCardFormat extends Abs\Validator
{
    protected $_defaultMessage = 'The value is not a valid Credit Card number';
    
    public function validate($value)
    {
        $value   = Types\String($value);
        $pattern = '/^\d{4}[\s\-]?\d{4}[\s\-]?\d{4}[\s\-]?\d{4}$/g';
        if (preg_match($pattern, $value))
            return true;
        return false;
    }
    
    public function renderError()
    {
        return $this->__get('_defaultMessage');
    }
        
}