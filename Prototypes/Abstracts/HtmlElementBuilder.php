<?php

namespace Prototypes\Abstracts;

abstract class HtmlElementBuilder
{
    protected $_htmlElement;
    
    public function __construct($htmlElement)
    {
        ;
    }
    
    public function getElement()
    {
        return $this->__get('_htmlElement');
    }
    
    public function createNewElement()
    {
        
    }
    
}