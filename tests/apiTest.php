<?php


/**
 *  Corresponding Class to test getcolors class
 *
 *  For each class in your library, there should be a corresponding Unit-Test for it
 *  Unit-Tests should be as much as possible independent from other test going on.
 *
 * @author yourname
 */
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
