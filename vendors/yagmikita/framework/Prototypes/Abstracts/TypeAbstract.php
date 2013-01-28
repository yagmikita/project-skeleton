<?php

namespace Prototypes\Abstracts;

use Traits as T,
    Prototypes\Interfaces as I,
    Application\Exceptions as E;

abstract class TypeAbstract implements I\HasValueInterface, \JsonSerializable, I\CanValidTypeInterface
{
    const ERROR_TYPE = "The value is not of a valid type";
    
    use T\magicGet, T\magicSet, T\value;
    
    protected $_value;
        
    public function __construct(
        $value,
        $initial
    )
    {
        if (is_null($value))
            $this->__set('_value', $initial);
        elseif ($this->isValidType($value))
            $this->__set('_value', $value);
        else
            throw new E\TypeException(self::ERROR_TYPE, 500);
    }
    
    public function jsonSerialize() {
        return $this->value();
    }
    
    public function __toString()
    {
        return json_encode($this);
    }
    
}