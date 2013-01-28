<?php

namespace Prototypes\Abstracts;

use Traits as T,
    Prototypes\Interfaces as Intrf;

abstract class BuilderAbstract implements Intrf\BuilderInterface
{
    use T\magicGet, T\magicSet;
    
    protected $_element;
    
    public function getElement()
    {
        return $this->__get('_htmlElement');
    }
    
    public function createNewElement()
    {
        $this->__set('_element', new HtmlElement);
    }
    
}