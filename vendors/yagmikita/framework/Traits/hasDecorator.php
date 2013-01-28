<?php

namespace Traits;

use Prototypes\Interfaces as Intrf;

trait hasDecorator {
    public function hasDecorator()
    {
        $d = $this->__get('_decorator');
        if ($d instanceof Intrf\Decorator)
            return true;
        return false;
    }
}