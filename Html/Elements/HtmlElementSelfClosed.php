<?php

namespace HtmlElements;

use Traits as T;

class HtmlElementSelfClosed extends \HtmlElement
{
    protected $_pattern = "<%s %s />";
    protected $_selfClosed = true;
}