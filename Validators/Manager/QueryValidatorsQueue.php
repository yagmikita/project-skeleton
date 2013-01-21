<?php

namespace Validators\Manager;

use Traits as T,
    Validators,
    Validators\Manager as Manager;

class QueryValidatorsQueue
{
    use T\magicGet, T\magicSet;
    
    protected $_validators;
    protected $_errors = array();
    
    public function __construct(array $validators)
    {
        $this->__set('_validators', $validators);
    }
    
    public function getErrors()
    {
        return $this->__get('_errors');
    }
    
    public function launchQueue()
    {
        $composer = new Manager\ValidatorComposer;  
        foreach ($this->__get('_validators') as $key => $validatorOpts) {           
            $name = $validatorOpts['name'];
            $value = $validatorOpts['value'];
            $params = isset($validatorOpts['params'])?$validatorOpts['params']:array();            
            $initialized = $composer->init($name, $params);
            if (!$composer->validate($value)) {
                $vn = $initialized->getFullyQualifiedValidatorName();
                $errors = $this->__get('_errors');
                array_push($errors, $vn::$MSG_INVALID_VALUE);
                $this->__set('_errors', $errors);
            }
        }
        return count($this->__get('_errors'))?false:true;
    }
    
}