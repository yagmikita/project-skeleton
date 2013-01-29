<?php

namespace Tests\Library;

use Tests,
    Types,
    Application\Exceptions;

class TArrayTest extends Tests\TestCase
{
    public $array;
    
    public function goodValues()
    {
        return array(
            array(''),
            array(1, 2, 3),
            array('234', 'test', 234, 99, 100.54)
        );
    }
    
    public function badValues()
    {
        return array(
            11,
            'test',
            23.23
        );
    }
 
    /**
     * @dataProvider goodValues
     */
    public function testCreateSuccess(array $ar)
    {
        $ta = new Types\TArray($ar);
        $this->assertTrue($ta instanceof Types\TArray);
        $this->assertTrue($ta->length() == count($ar));
    }
    
    public function testNoElements()
    {
        $ta = new Types\TArray();
        $this->assertTrue($ta->length()==0);
        $ta = new Types\TArray(null);
        $this->assertTrue($ta->length()==0);
    }
    
    /**
     * @dataProvider badValues
     * @expectedException Application\Exceptions\TypeException
     */
    public function testCreateFails(array $ar)
    {
        $ta = new Types\TArray($ar);
    }

    /**
     * @dataProvider goodValues
     */
    public function testImplodeWorks(array $ar)
    {
        $ta = new Types\TArray($ar);
        $this->assertTrue($ta->implode() instanceof Types\TString);
    }
    
}