<?php

namespace Prototypes\Abstracts;

use Traits as T,
    Prototypes\Interfaces as Intrf,
    Application\Exceptions as error;

abstract class HtmlElementAbstract implements Intrf\HtmlElementInterface
{
    use T\magicGet, T\magicSet,
        T\setValidator, T\getValidator, T\hasValidator,
        T\setDecorator, T\getDecorator, T\hasDecorator;

    /**
     * Error messages
     */
    const ERROR_INVALID_OPTIONS = "The options are in the invalid format. Check the requirements.";
    
    /**
     * The name of the Element
     * * - required
     * 
     * @var type php string
     */
    protected $_name;   
    
    /**
     * Thre set of attributes to use if no attributes are set, but defaults exist
     * 
     * @var type php array
     */
    public $defaultAttributes = array();
    
    /**
     * Represents the string pattern to be rendered by Prototypes\Interfaces\Renderable
     * * - required
     * 
     * @var type php string
     */
    protected $_pattern;
    
    /**
     * Represents the array of html tag attributes
     * * - required
     * 
     * @var type php array
     */
    protected $_attributes;
    
    /**
     * This flag indicates, whether the tag is self-closed
     * * - required
     * 
     * @var type 
     */
    protected $_selfClosed;   
    
    /**
     * The decorator object of the element
     * 
     * @var type Prototypes\Interfaces\Decorator
     */    
    protected $_decorators;
    
    /**
     * The validator object of the element
     * 
     * @var type Prototypes\Interfaces\Decorator
     */    
    protected $_validators;
    
    
    public function __construct(array $options)
    {
        if (!self::areOptionsValid($options))
            throw new error\InvalidOptionsException();
        $attributes = isset($options['_attributes'])?$options['_attributes']:$this->__get('_defaultAttributes');
        $this->__set('_attributes', $attributes);
        $decorator  = isset($options['_decorator'])?$options['_decorator']:null;
        $this->setDecorator($decorator);
        $validator  = isset($options['_validator'])?$options['_validator']:null;
        $this->setValidator($validator);
    }
    
    public static function areOptionsValid(array $a)
    {
        if (isset($a['_name'])&&isset($a['_attributes'])&&isset($a['_selfClosed'])&&isset($a['_pattern'])) {
            if (count($a['_attributes']))
                return true;
            else
                return false;
        }
    }

}