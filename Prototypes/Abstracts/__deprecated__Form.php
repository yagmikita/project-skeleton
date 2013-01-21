<?php

namespace Prototypes\Abstracts;

use Traits as T,
    Decorators\UI as Decor,
    Prototype\Abstracts as Abs,
    Prototypes\Interfaces as Intrf;

abstract class FormAbstract implements Intrf\Form
{
    use T\magicGet, T\magicSet, T\setValidator, T\getValidator, T\setDecorator, T\getDecorator, T\hasDecorator, T\hasValidator;
    
    protected $_decorator;
    protected $_elements;
    protected $_params;
    protected $_errors;
    
    public function __construct(array $params = null)
    {
        if (is_null($params)) {
            $params = $this->__get('defaultParams');
        }
        $this->__set('_params', $params);
        $this->setDecorator(new Decor\Form($this->__get('_params')));
    }
    
    public function addFormElement($element)
    {
        if (is_array($element)) {
            if (Abs\HtmlElement::areOptionsValid($element)) {
                $cn = Abs\HtmlElement::desideClassName($element['_selfClosed']);
                array_push($this->__get('_elements'), new $cn($element));
            }
        } elseif ($element instanceof Intrf\HtmlElementAbstract) {
            array_push($this->__get('_elements'), $element);
        }
        return false;
    }
    
    public function addFormElements(array $elements)
    {
        $this->__set('_elements', $elements);
    }
    
    public function renderElements()
    {
        /*$renderedElems = '';
        foreach ($this->__get('_elements') as $element) {
            $renderedElems = $element->render();
        }
        return $renderedElems;*/
        return " :: Elements are rendered :: ";
    }
    
}