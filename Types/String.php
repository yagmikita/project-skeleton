<?php

namespace Types;

use Traits,
    Prototypes\Interfaces as I,
    Application\Exceptions as error;

class String implements I\HasValueInterface
{
    use Traits\magicGet, Traits\magicSet;
    
    const ERROR_VALUE_IS_NOT_A_STRING = "The value is not a valid php string";
    
    protected $_value;
    
    public function __construct($value)
    {
        $value = is_null($value)?'':$value;
        if (is_string($value))
            $this->__set('_value', $value);
        else
            throw new error\TypeException(self::ERROR_VALUE_IS_NOT_A_STRING . " ('{$value}')", 500);
    }
    
    public function value()
    {
        return $this->__get('_value');
    }
    
    public function __toString()
    {
        return $this->value();
    }
    
    public function length()
    {
       return strlen($this->value()); 
    }
    
    /**
     * Analog of vsprintf() function
     * 
     * @param array $subs
     * @return PHP string
     */
    public function substitute(array $subs = array())
    {
        return vprintf($this->__get('_value'), $subs);
    }
    
    /**
     * Analog of substr() function
     * @param type $from
     * @param type $to
     * @return PHP string
     */
    public function cut($from = null, $to = null)
    {
        $from = is_null($from)?0:intval($to);
        $to   = is_null($to)?$this->length():intval($to);
        return substr($this->__get('_value'), $from, $to);
    }
    
    
    public function toCamelCase($separator = " ")
    {
        $complete = '';
        $parts = explode($separator, $this->__get('_value'));
        foreach ($parts as $key => $part) {
            if ($key == 0) {
                $complete .= $this->toLowerCase();
            }
        }
        return $complete;
    }
    
}