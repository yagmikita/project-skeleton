<?php

namespace Prototypes\Interfaces;

interface ElementableInterface
{
    public function addElement($element);
    public function addElements(array $elements);    
    public function renderElements();
}