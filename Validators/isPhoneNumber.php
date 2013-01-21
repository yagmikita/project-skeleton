<?php

namespace Validators;

use Types,
    Prototypes\Abstracts as Abs;

class isPhoneNumber extends Abs\Validator
{
    protected $_defaultMessage = "The value is not a valid phone number (Example: (056)7692314)";
    
    public function validate($value)
    {
        $value   = Types\String($value);
        $pattern = '/^(\(?(\d{3})\)?\s?-?\s?(\d{3})\s?-?\s?(\d{4}))$/gm';
        if (preg_match($pattern, $value))
            return true;
        return false;
    }
    
    public function renderError()
    {   
        return $this->__get('_defaultMessage');
    }
    
}