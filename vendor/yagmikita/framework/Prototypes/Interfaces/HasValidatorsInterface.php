<?php

namespace Prototypes\Interfaces;

use Prototypes\Interfaces as I;

interface HasValidatorsInterface
{
    public function addValidator(I\Validator $validator);    
    public function setValidators(array $validators);
    public function hasValidators();
    public function getValidators();
    public function proceedValidation();
    public function getErrors();
}