<?php
/**
 * Describes a Request class
 * 
 * PHP version 5.4
 * 
 * @category Application
 * @package  Application_Request
 * @author   Gopkalo Mykyta <yagmikita@gmail.com>
 * @license  GNU GPL
 * @link     http://192.168.7.101/docs/application/request
 */

namespace Application\Request;

/**
 * Request object that aids to manage requests in a OOP-way
 * 
 * @category Application
 * @package  Application_Request
 * @author   Gopkalo Mykyta <yagmikita@gmail.com>
 * @license  GNU GPL
 * @link     http://192.168.7.101/docs/application/request/request
 */
class Request extends \Prototypes\Abstracts\RequestAbstract
{
    /**
     * Public constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->__set('_type', 'mixed');
    }
    
}