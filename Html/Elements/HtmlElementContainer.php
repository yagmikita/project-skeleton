<?php

namespace HtmlElements;

use Traits as T;

class HtmlElementContainer extends \HtmlElement
{
    protected $_pattern = "<%s %s>%s</%s>";
    protected $_selfClosed = false;
    
    public function addElement($elements)
    {
        ;
    }
    
    public function addElements(array $elements)
    {
        ;
    }
    
    public function setContent($content)
    {
        ;
    }
    
    public function getContent()
    {
        ;
    }
    
    public function renderElements()
    {
        ;
    }
    
}