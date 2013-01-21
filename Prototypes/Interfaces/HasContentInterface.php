<?php

namespace Prototypes\Interfaces;

use Types,
    Prototypes\Interfaces as I;

interface HasContentInterface
{
    public function addElement(I\HtmlElementInterface $element);
    public function setElements(array $elements);
    public function getElements();
    public function renderElements();    
    public function setContent(Types\String $content);
    public function getContent();   
}