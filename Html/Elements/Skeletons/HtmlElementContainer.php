<?php

namespace Html\Elements\Skeletons;

use Prototypes\Interfaces as I,
    Prototypes\Abstracts as A;

/**
 * Container html element with inner content
 * 
 * @author Gopkalo Nikita <yagmikita@gmail.com>
 */
class HtmlElementContainer extends A\HtmlElementAbstract implements I\HasContentInterface
{
    /**
     * The inner plain text content of the element
     * 
     * @var type Types\String
     */
    protected $_content;
    
    /**
     * If content if not defined, then the list of elements is being rendered
     * 
     * @var type 
     */
    protected $_elements;
    
    /**
     * Public constructor - overrides the abstract constructor
     * 
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->__set('_pattern', '<%s %s>%s</%s>');
        $this->__set('_selfClosed', false);
        $this->__set('_content', new Types\String());
        $this->__set('_elements', array());
    }
    
    /**
     * Add the HtmlElementInterface element the the end of the elements list
     * 
     * @param \Prototypes\Interfaces\HtmlElementInterface $element
     */
    public function addElement(I\HtmlElementInterface $element)
    {
        $elements = $this->__get('_elements');
        array_push($elements, $element);
        $this->setElements($elements);
    }
    
    /**
     * Sets the list of included elements
     * 
     * @param array $elements
     */
    public function setElements(array $elements)
    {
        $this->__set('_elements', $elements);
    }
    
    /**
     * Gets the list of included elements
     * 
     * @return type
     */
    public function getElements()
    {
        return $this->__get('_elements');
    }
    
    /**
     * Sets the inner content of the element
     * 
     * @param mixed $content
     */
    public function setContent($content)
    {
        if ($content instanceof Types\String)
            $this->__set('_content', $content);
        elseif (is_string($content))
            $this->__set('_content', new Types\String($value));
    }
    
    /**
     * Gets the inner content (html chunk) of the element
     * 
     * @return type php string
     */
    public function getContent()
    {
        return $this->__get('_content')->value();
    }
    
    /**
     * Renders all included elements which form
     * the inner content of the current element
     * 
     * @return type php string
     */
    public function renderElements()
    {
        $content = '';
        foreach ($this->__get('_elements') as $element){
            $content .= $element->render();
        }
        return $content;
    }

    /**
     * Gets the inner content of the element
     * 
     * @return type php string
     */
    public function value()
    {
        $content = new Types\String($this->getContent());
        if ($content->length())
            return $this->getContent();
        else
            return $this->renderElements();
    }
    
    /**
     * Symlink to a $this->value() method
     * 
     * @return type php string
     */
    public function innerHTML()
    {
        return $this->value();
    }

    /**
     * Renders the element itself using $this->_pattern template
     * 
     * @return type php string
     */
    public function renderElement()
    {
        return vsprintf($this->__get('_pattern'), array(
            $this->__get('_name'),
            $this->renderAttributes(),
            $this->renderElements(),
            $this->__get('_name'),
        ));
    }
    
}