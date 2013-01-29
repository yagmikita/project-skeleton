<?php

namespace Html\Elements\Tags;

use Html\Elements\Skeletons as Skeletons;

class Script extends Skeletons\HtmlElementContainer
{
    protected $_name = 'script';
    protected $_defaultAttributes = array(
        'type' => 'text/javascript'
    );    
}