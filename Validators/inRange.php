<?php

namespace Validators;

use Types,
    Prototypes\Abstracts as Abs;

class inRange extends Abs\Validator
{
    protected $_defaultMessage = 'The value in not in a set range';
    
    public function validate($value)
    {
        $value   = Types\String($value);
        $range = is_array($this->__get('_params')['range'])?$this->__get('_params')['range']:array($this->__get('_params')['range']);
        return in_array($value, $range);
    }
    
    public function renderError()
    {
        return $this->__get('_defaultMessage');
    }
        
}