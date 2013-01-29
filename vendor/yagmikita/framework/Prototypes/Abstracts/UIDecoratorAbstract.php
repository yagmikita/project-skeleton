<?php
/**
 * Describes a form user interface abstract decorator class
 * 
 * PHP version 5.4
 * 
 * @category Decorators
 * @package  Decorators_UI
 * @author   Gopkalo Mykyta <yagmikita@gmail.com>
 * @license  GNU GPL
 * @link     http://192.168.7.101/docs/decorators/ui/
 */

namespace Prototypes\Abstracts;

/**
 * Abstract user interface decorator class, differs from
 * a regular decorator by the existence of $_pattern field
 * 
 * @category Decorators
 * @package  Decorators_U
 * @author   Gopkalo Mykyta <yagmikita@gmail.com>
 * @license  GNU GPL
 * @link     http://192.168.7.101/docs/decorators/ui/form/
 */
abstract class UIDecoratorAbstract extends \DecoratorInterface
{
    protected $_pattern;
}