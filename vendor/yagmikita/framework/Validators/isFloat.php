<?php

namespace Validators;

use Prototypes\Abstracts as Abs;

class isFloat extends Abs\Validator
{
    protected $_defaultMessage = 'The value is not a valid floating point number';
    
    public function validate($value)
    {
        return is_float($value);
    }
    
    public function renderError()
    {
        return $this->__get('_defaultMessage');
    }
        
}