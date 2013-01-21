<?php

namespace Traits;

use Prototypes\Interfaces as Intrf;

trait setDecorator {
    public function setDecorator(Intrf\Decorator $decorator)
    {
        $this->__set('_decorator', $decorator);
    }
}