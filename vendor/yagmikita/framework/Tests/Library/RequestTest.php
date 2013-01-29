<?php

namespace Tests\Library;

use Tests,
    Application;

class RequestTest extends Tests\TestCase
{
    protected $request;
    
    public function setUp()
    {
        parent::setUp();
        $this->request = new Application\Request;
    }
    
    public function tearDown()
    {
        parent::tearDown();
        unset($this->request);
    }
    
    public function testSmth()
    {
        
    }
    
}