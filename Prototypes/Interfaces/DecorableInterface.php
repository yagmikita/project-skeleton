<?php

namespace Prototypes\Interfaces;

interface DecorableInterface
{
    public function setDecorator(\Decorator $decorator);
    public function getDecorator();
    public function hasDecorator();
}