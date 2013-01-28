<?php

namespace Types;

use Traits as T,
    Prototypes\Abstracts as A,        
    Prototypes\Interfaces as I,
    Application\Exceptions as E;

/**
 * Implementation of String class, which is the wrapper of a string type
 */
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
     * User Required Section
     */
    
    /**
     * Imitates explode behavior
     * @param php string $separator
     * @return \Types\Types\TArray
     */
    public function explode($separator = ' ')
    {
        return new Types\TArray(explode($separator, $this->__get('_value')));
    }
    
    /**
     * Analog of vsprintf() function
     * 
     * @param array $subs
     * @return php string
     */
    public function substitute(array $subs = array())
    {
        return vprintf($this->__get('_value'), $subs);
    }
    
    /**
     * Analog of substr() function
     * @param int $from
     * @param int $to
     * @return php string
     */
    public function cut($from = null, $to = null)
    {
        $from = is_null($from)?0:intval($to);
        $to   = is_null($to)?$this->length():intval($to);
        return substr($this->__get('_value'), $from, $to);
    }
    
    /**
     * Converts the value to camel-case format
     * @param php string $separator
     * @return php string
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
     * @param php string $separator
     * @return php string
     */
    public function camelCase($separator = " ")
    {
        return $this->toCamelCase($separator);
    }
    
}