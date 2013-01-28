<?php

namespace Traits;

use Prototypes\Interfaces as Intrf;

trait setValidator {
    public function setValidator(Intrf\Validator $validator)
    {
        $this->__set('_validator', $validator);
    }
}