<?php

namespace Prototypes\Abstracts;

use Types,
    Traits as T,
    Prototypes\Interfaces as I;

abstract class RequestAbstract implements I\RequestInterface
{
    use T\magicGet, T\magicSet;
    
    protected $_type;
    protected $_params;
    protected $_method;
    protected $_location;
    protected $_referrer;
    protected $_controller;
    protected $_action;
    
    public function __construct()
    {
        $this->__set('_params', $_REQUEST);
        $this->__set('_location', $_SERVER['REQUEST_URI']);
        $this->__set('_method', $_SERVER['REQUESTED_METHOD']);
        $this->__set('_referrer', $_SERVER['HTTP_REFERER']);
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
        return $this->__get('_method');;
    }
    
    public function dispatchRequest()
    {
        $reqs = new Types\TArray(explode('/', $this->__get('_request')));
    }
    
}
