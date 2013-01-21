<?php

namespace Prototypes\Interfaces;

use Types;

interface ContentableInterface
{
    public function setContent(Types\String $content);
    public function getContent();
}