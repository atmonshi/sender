<?php

class apiTest extends PHPUnit_Framework_TestCase
{
    /**
     * Just check if the getBalance has no syntax error
     */
    public function testIsThereAnySyntaxError()
    {
        $var = new atmonshi\sender\api();
        $this->assertTrue(is_object($var));
        unset($var);
    }
}
