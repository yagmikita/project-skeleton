<?php

namespace Html\Elements;

use Traits as T;

abstract class HtmlElementBuilder
{
    use T\magicGet, T\magicSet;
    
    protected $_htmlElement;
    
    public function createHtmlElement()
    {
        $this->__set('_htmlElement', new \HtmlElement);
    }
            
}