<?php

namespace Tutor\Calculator;

class IntegerCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Tutor\Calculator\IntegerCalculator
     */
    private $_calculator;
    
    public function setUp()
    {
        $this->_calculator = new IntegerCalculator();
    }
    
    public function tearDown()
    {
        $this->_calculator = null;
    }
    
    public static function additionProvider()
    {
        return array(
            array(30, 12, 42),
            array(12, 8, 20),
            array(-10, 3, -7),
            array(82, -99, -17)
        );
    }
    
    public function testInterfaceImplementation()
    {
        $this->assertInstanceOf('Tutor\Calculator\CalculatorInterface', $this->_calculator);
    }
    
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $this->_calculator->add($a, $b));
    }
    
    public function testAddExceptionThrownIfFirstArgumentNotInteger()
    {
        $this->setExpectedException('Exception', 'Non-integer argument provided');
        $this->_calculator->add('BOO', 10);
    }
    
    public function testAddExceptionThrownIfSecondArgumentNotInteger()
    {
        $this->setExpectedException('Exception', 'Non-integer argument provided');
        $this->_calculator->add(22, 'YAH');
    }
    
    public function testOverflow()
    {
        $this->assertInternalType('float', PHP_INT_MAX + 1);
        $this->assertInternalType('float', PHP_INT_MAX - -1);
    }
    
    public function testUnderflow()
    {
        $this->assertInternalType('float', (PHP_INT_MAX * -1) - 2);
        $this->assertInternalType('float', (PHP_INT_MAX * -1) + -2);
    }
    
    public function testAddIntegerOverflowThrowsException()
    {
        $this->setExpectedException('OverflowException', 'Integer overflow!');
        $this->_calculator->add(PHP_INT_MAX, 1);
    }
    
    public function testAddIntegerUnderflowThrowsException()
    {
        $this->setExpectedException('UnderflowException', 'Integer underflow!');
        $this->_calculator->add((PHP_INT_MAX * -1), -2);
    }
    
}
