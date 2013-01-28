<?php

namespace Html\Elements\Skeletons;

use Prototypes\Abstracts as A;

/**
 * Self-closed html element with has no inner content
 * 
 * @author Gopkalo Nikita <yagmikita@gmail.com>
 */
class HtmlElementSelfClosed extends A\HtmlElementAbstract
{
    /**
     * Public constructor - overrides the abstract constructor
     * 
     * @param array $options
     */    
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->__set('_pattern', '<%s %s>');
        $this->__set('_selfClosed', true);
    }
 
    /**
     * Render the element itself
     * 
     * @return type
     */
    public function renderElement()
    {
        return vsprintf($this->__get('_pattern'), array(
            $this->__get('_name'),
            $this->renderAttributes(),
        ));
    }
    
    /**
     * Gets the value attribute of the element
     * 
     * @return type php string
     */
    public function value()
    {
        return isset($this->__get('_attributes')['value'])?$this->__get('_attributes')['value']:'';
    }
    
}