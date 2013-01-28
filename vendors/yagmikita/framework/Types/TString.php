<?php

namespace Types;

use Traits as T,
    Prototypes\Abstracts as A,        
    Prototypes\Interfaces as I,
    Application\Exceptions as E;

class TString extends A\TypeAbstract implements I\HasLengthInterface, I\CanValidType
{
    public function __construct($value)
    {
        parent::__construct($value, '');
    }
    
    public function length()
    {
       return strlen($this->value()); 
    }
    
    public function isValidType($value)
    {
        return is_string($value);
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
    
    /**
     * Converts the value to camel-case format
     * @param type php string $separator
     * @return type php string
     */
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
    
    /**
     * Symlink to $this->toCamelCase()
     * @param type php string $separator
     */
    public function camelCase($separator = " ")
    {
        $this->toCamelCase($separator);
    }
    
}