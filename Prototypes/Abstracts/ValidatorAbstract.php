<?php

namespace Prototypes\Abstracts;

use Types,
    Traits as T,
    Prototypes\Interfaces as I;

abstract class ValidatorAbstract implements I\ValidatorInterface
{
    use T\magicGet, T\magicSet;
    
    public static $MSG_INVALID_VALUE;
        
    protected $_params;
    
    protected $_defaultMessage;    
    
    public function __construct(array $params = array(), $errorMsg = '')
    {
        $this->__set('_params', $params);
        $msg = new Types\String($errorMsg);
        if ($msg->length())
            self::$MSG_INVALID_VALUE = $msg->value();
        else
            self::$MSG_INVALID_VALUE = $this->renderError();       
    }
    
    public function getError()
    {
        return self::$MSG_INVALID_VALUE;
    }
    
}