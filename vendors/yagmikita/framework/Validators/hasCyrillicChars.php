<?php

namespace Validators;

use Types,
    Prototypes\Abstracts as Abs;

class hasCyrillicChars extends Abs\Validator
{
    protected $_defaultMessage = 'The value does not have a single cyrillic character';
    
    public function validate($value)
    {
        $value   = Types\String($value);
        $pattern = '/[\p{А-Яа-яЁё}]+/g';
        if (preg_match($pattern, $value->value()))
            return true;
        return false;
    }
    
    public function renderError()
    {
        return $this->__get('_defaultMessage');
    }
        
}