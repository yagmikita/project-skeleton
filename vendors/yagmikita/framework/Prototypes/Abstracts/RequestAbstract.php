<?php

namespace Prototypes\Abstracts;

use Traits as T,
    Prototypes\Interfaces as I;

abstract class RequestAbstract implements I\RequestInterface
{
    use T\magicGet, T\magicSet;
    
    protected $_type;
    protected $_params;
    
    public function __construct()
    {
        $this->__set('_params', $_REQUEST);
    }
    
    public function getParam($key, $default = '')
    {
        $params = $this->__get('_params');
        if (isset($params[$key]))
            return $params[$key];
        return $default;
    }
    
    public function getParams()
    {
        return $this->__get('_params');
    }
    
    public function isPostRequest()
    {
        return count($_POST)>0?true:false;
    }
    
}
