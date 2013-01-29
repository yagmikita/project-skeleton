<?php

namespace Prototypes\Interfaces;

interface ValidatorInterface
{
    /**
     * Checks the value for validity to specific options
     * 
     * @param type $value
     * @return type php boolean
     */
    public function validate($value);
    public function renderError();
    public function getError();
}