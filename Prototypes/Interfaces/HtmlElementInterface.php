<?php

namespace Prototypes\Interfaces;

interface HtmlElementInterface extends \GUIElementInterface, \HasValueInterface
{
    public function renderElement();
    public function renderAttributes();
}