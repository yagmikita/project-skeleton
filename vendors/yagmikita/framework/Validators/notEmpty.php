<?php

namespace Validators;

use Prototypes\Abstracts as Abs;

class notEmpty extends Abs\Validator
{   
    protected $_defaultMessage = 'The value must not be empty';
    
    public function validate($value)
    {
        if (!isset($value)||is_null($value)||$value=='')
            return false;
        return true;
    }
    
    public function renderError()
    {
        return $this->__get('_defaultMessage');
    }
    
}