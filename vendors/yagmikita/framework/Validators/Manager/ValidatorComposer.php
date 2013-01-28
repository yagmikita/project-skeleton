<?php

namespace Validators\Manager;

use Traits as T,
    Validators,
    Validators\Manager as Manager;

class ValidatorComposer
{
    use T\magicGet, T\magicSet;
    
    const ERROR_VALIDATOR_NOT_FOUND = "You indicated the wrong validator name '%s'";
    
    /**
     * Validators simlinks - sugar
     * 
     * @var type php array
     */
    protected $_autocomplete = array(
        'hasCyrillicChars' => array(
            'cyr',
            'cyrillic',
            'cyrChars',
            'hasCyrillic',
            'hasCyrChars',
            'hasCyrCharacters',
            'cyrillicCharacters',
            'hasCyrillicCharacters',
        ),
        'inRange' => array(
            'inArray',
            'isOwned',
            'belongsTo',
        ),
        'isCreditCardFormat' => array(
            'isCC',
            'isValidCC',
            'isCCFormat',
            'isCreditCard',
            'isValidCCForms',
            'isValidCreditCard',
        ),
        'isFloat' => array(
            'float',
            'double',
        ),
        'isNumeric' => array(
            'number',
            'numeric',
            'isNumber',
        ),
        'isPhoneNumber' => array(
            'phone',
            'phoneNumber',
        ),
        'minMaxString' => array(
            'minMax',
            'maxMin'
        ),
        'notEmpty' => array(
            'set',
            'isSet',
            'filled',
            'isSetUp',
            'hasValue',
        ),
    );
    
    /**
     * Initial user-defined query, to be parsed for a validator match
     * 
     * @var type php string
     */
    protected $_validatorQuery;    
    /**
     * Holds the user-defined compiled name
     * 
     * @var type php string
     */
    protected $_compiledValidator;
    
    /**
     * Holds the valid currenct valid validator name
     * 
     * @var type php string
     */
    protected $_matchedValidator;
    
    /**
     * The the array of validator params
     * 
     * @var type php array
     */
    protected $_params;

    public function __construct(array $autocomplete = null)
    {
        if (!is_null($autocomplete))
            $this->__set('_autocomplete', $autocomplete);        
    }
    
    public function init($vName, array $params = array())
    {
        $this->__set('_validatorQuery', $vName);
        $this->__set('_params', $params);
        return $this;
    }
    
    public function validate($value)
    {
        $name = $this->getFullyQualifiedValidatorName();
        if (DEBUG_MODE) {
            var_dump("Attempting to instantiate validator: " . $name);
            var_dump($this->__get('_params')); 
        }
        $validator = new $name($this->__get('_params'));
        return $validator->validate($value);
    }
    
    public function getFullyQualifiedValidatorName()
    {
        return "Validators\\" . $this->compileName();
    }
    
    protected function compileName()
    {
        $parts = explode(' ', $this->__get('_validatorQuery'));
        $cnt = count($parts);
        if (isset($parts[0]))
            $parts[0] = strtolower($parts[0]);
        if ($cnt > 1) {
            for ($i = 1; $i <= ($cnt-1); $i++) {
                $parts[$i] = ucfirst(strtolower($parts[$i]));
            }
        }
        $this->__set('_compiledValidator', implode('', $parts));
        if ($this->match())
            return $this->__get('_matchedValidator');
        else
            throw new Exception(sprintf(ERROR_VALIDATOR_NOT_FOUND, $this->__get('_compiledValidator')));
    }
    
    protected function match()
    {
        foreach ($this->__get('_autocomplete') as $key => $values) {
            if ($key == $this->__get('_compiledValidator')) {
                $this->__set('_matchedValidator', $key);
                return true;
            } else {
                foreach ($values as $value)
                    if ($value == $this->__get('_compiledValidator')) {
                        $this->__set('_matchedValidator', $key);
                        return true;
                    }
            }
        }
        return false;
    }
    
}