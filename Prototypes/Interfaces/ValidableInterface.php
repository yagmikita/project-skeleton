<?php

namespace Prototypes\Interfaces;

use Prototypes\Interfaces as I;

interface ValidableInterface
{
    public function setValidators(array $validators);
    public function addValidator(I\Validator $validator);
    public function getValidators();
}