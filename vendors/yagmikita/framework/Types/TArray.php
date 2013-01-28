<?php

namespace Types;

use Traits as T,
    Prototypes\Abstracts as A,        
    Prototypes\Interfaces as I,
    Application\Exceptions as E;

class TArray extends A\TypeAbstract implements I\HasLengthInterface,  \Iterator
{   
    protected $_position;
    
    public function __construct($value)
    {
        parent::__construct($value, array());
        $this->__set('_position', 0);
    }
    
    public function length()
    {
       return count($this->value()); 
    }
    
    public function isValidType($value)
    {
        return is_array($value);
    }
    
    function rewind()
    {
        $this->__set('_position', 0);
    }

    function current()
    {
        return $this->__get('_value')[$this->key()];
    }

    function key()
    {
        return $this->__get('_position');
    }

    function next()
    {
        $this->__set('_position', $this->__get('_position')++);
    }

    function valid()
    {
        return isset($this->current());
    }    
    
}