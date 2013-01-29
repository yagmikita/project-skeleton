<?php

namespace Traits;

use Prototypes\Interfaces as Intrf;

trait hasValidator {
    public function hasValidator()
    {
        $v = $this->__get('_validator');
        if ($v instanceof Intrf\Validator)
            return true;
        return false;
    }
}