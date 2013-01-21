<?php

namespace Traits;

use Application\Exceptions as error;

trait magicSet {
    public function __set($key, $value)
    {
        if (DEBUG_MODE) {
            echo("<p>setting: " . get_class($this) . "->" . $key . " = " . $value . "</p>");
        }   
        if (property_exists($this, $key)) {
            $this->$key = $value;
        } else {
            throw new error\Http500Exception(sprintf(CLASS_PARAM_IS_NOT_SET, $key, get_class($this)));
        }
    }
}