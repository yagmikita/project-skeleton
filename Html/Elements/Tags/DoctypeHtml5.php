<?php

namespace Html\Elements\Tags;

use Html\Elements\Skeletons as Skeletons;

class DoctypeHtml5 extends Skeletons\HtmlElementSelfClosed
{
    protected $_name = '!DOCTYPE html';
    
    public function __construct($options)
    {
        parent::__construct($options);
        $this->__set('_pattern', '<%s>');
        $this->__set('_attributes', array());
        $this->__set('_validators', array());    
        $this->__set('_decorators', array());
    }
    
    /**
     * Render the element itself
     * 
     * @return type
     */
    public function renderElement()
    {
        return vsprintf($this->__get('_pattern'), array(
            $this->__get('_name')
        ));
    }
    
    /**
     * Renders the doctype as the element without decorations
     * 
     * @return type php string
     */
    public function render()
    {
        return $this->renderElement();
    }   
    
    /**
     * Gets the value attribute of the element
     * 
     * @return type php string
     */
    public function value()
    {
        return $this->render();
    }    
}