<?php

namespace Html\Elements\Tags;

use Html\Elements\Skeletons as Skeletons;

class Link extends Skeletons\HtmlElementSelfClosed
{
    protected $_name = 'link';
    protected $_defaultAttributes = array(
        'rel' => 'stylesheet',
        'type' => 'text/css',
    );
}