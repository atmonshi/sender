<?php
class apiTest extends PHPUnit_Framework_TestCase
{

    /**
     * Just check if the getBalance has no syntax error
     */
    public function testIsThereAnySyntaxError()
    {
        $var = new wa7eedem\smsGate\api();
        $this->assertTrue(is_object($var));
        unset($var);
    }
}
