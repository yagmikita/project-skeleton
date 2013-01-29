<?php

namespace Prototypes\Interfaces;

use Prototypes\Interfaces as I;

interface HasDecoratorsInterface
{
    public function addDecorator(I\Decorator $decorator);
    public function setDecorators(array $decorators);
    public function hasDecorators();    
    public function getDecorator();
    public function applyDecorations($content);
}