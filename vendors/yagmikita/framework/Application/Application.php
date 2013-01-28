<?php

namespace Application;

use Application\Exceptions As E,
    Traits as T;

class Application extends stdClass
{
    use T\magicGet, T\magicSet;
    
    /**
     * array of application configs, converted to stdClass
     * @var type stdClass
     */
    protected $_options;
    
    /**
     * Holds options for different components initialization
     * @var type 
     */
    protected $_components;
    
    /**
     *
     * @var Application\Request
     */
    protected $_request;
    protected $_response;
    
    public static function constants(array $constants)
    {
        foreach ($constants as $const) {
            define($const['name'], $const['value']);
        }
        defined('DIRECTORY_SEPARATOR') or define('DIRECTORY_SEPARATOR', self::userOS() == 'mac' || self::userOS() == 'linux' ? '\/' : '\\');
        defined('APP_PATH') or define('APP_PATH', __DIR__);
        defined('ERROR_PARAM') || define('ERROR_PARAM', 'The parameter "%s" you are trying to access is not presenter in the class "%s".');
        defined('APP_ENV') or define('APP_ENV', 'production');
        defined('APP_UID') or define('APP_UID', uniqid('APP-', true)); 
    }
    
    public function __construct(
        \Request $request,
        array $constants
    )
    {
        self::constants($constants);
        $this->configure($this->getConfigs());
        $this->__set('_request', $request);
        $this->__get('_request')->dispatchRequest();
    }
    
    protected function getConfigs()
    {
        return require_once APP_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . APP_ENV;
    }
    
    protected function configure($configs)
    {
        foreach ($configs->populate as $key => $value)
            $this->$key = $value;        
        if (!$configs) {
            $configs['common']['debug'] = false;
            $configs['common']['time_zone'] = 'Europe/Kiev';
            $configs['common']['title'] = 'Application';
        }
        $this->__set('_options', (object)$configs['common']);
        $this->applyConfigs();
        $this->__set('_components', (object)$configs['components']);
    }
    
    protected function applyConfigs()
    {
        if ($this->__get('_options')->debug)
            error_reporting(E_ALL);
        else 
            error_reporting(0);
        date_default_timezone_set($this->__get('_options')->time_zone);
    }

    protected static function userOS() 
    { 
        $os = strtolower(PHP_OS);
        if (preg_match('/linux/i', $os)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $os)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $os)) {
            $platform = 'windows';
        }
        return $platform;
    }
    
}