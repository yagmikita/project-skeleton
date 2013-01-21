<?php

error_reporting(E_ALL);

try {
    require_once __DIR__ . '/bootstrap.php';

    $form = new \Html\Elements\Form();

    /*$form->addFormElement(array(
        'type' => 'input',
        'params' => array(
            'type'  => 'text',
            'id'    => 'test1',
            'name'  => 'test1',
            'class' => 'test-input'
        ),
        'decorators' => array(
            'table form element'
        ),
        'validators' => array(
            'limited string' => array(
                'min' => 1,
                'max' => 16
            )
        )
    ));*/
    //echo $form->render();
    echo "Done => Success";
    /*$validationManager = new Validators\Manager\QueryValidatorsQueue(array(
        array(
            'name' => 'not empty',
            'value' => '123.3'
        ),
        array(
            'name' => 'is float',
            'value' => '123.3'
        ),
        array(
            'name' => 'min max',
            'value' => '123.3',
            'params' => array(
                'min' => 6,
                'max' => 12
            ),
        ),
    ));
    if (!$validationManager->launchQueue()) {
        echo "Done => Errors";
        var_dump($validationManager->getErrors());
    } else {
        echo "Done => Success";
    }*/
} catch (Exception $e) {
    echo("<p style='color:red;'>Exception: " . $e->getMessage()."</p>");
    var_dump($e->getTraceAsString());
}