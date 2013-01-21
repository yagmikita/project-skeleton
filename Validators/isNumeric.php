<?php

namespace Validators;

use Prototypes\Abstracts as Abs;

class isNumeric extends Abs\Validator
{
    protected $_defaultMessage = 'The value is not a number';
    
    public function validate($value)
    {
        return is_numeric($value);
    }
    
    public function renderError()
    {     
        return $this->__get('_defaultMessage');
    }
        
}