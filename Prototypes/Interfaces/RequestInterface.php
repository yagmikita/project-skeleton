<?php

namespace Prototypes\Interfaces;

interface RequestInterface
{
    public function getParam($key, $default);
    public function getParams();
    public function isPostRequest();
}
