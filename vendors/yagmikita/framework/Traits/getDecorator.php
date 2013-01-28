<?php

namespace Traits;

trait getDecorator {
    public function getDecorator()
    {
        return $this->__get('_decorator');
    }
}