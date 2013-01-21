<?php

namespace Html\Elements\Tags;

use Html\Elements\Skeletons as Skeletons;

class Form extends Skeletons\HtmlElementContainer
{
    protected $_name = 'form';
    protected $_defaultAttributes = array(
        'id' => 'form1',
        'name' => 'form1',
        'method' => 'POST',
        'action' => '',
        'enctype' => 'application/x-www-form-urlencoded'
    );    
}