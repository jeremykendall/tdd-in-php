<?php

namespace Tutor\Calculator;

class BinaryCalculatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Tutor\Calculator\BinaryCalculator
     */
    private $_calculator;

    public function setUp()
    {
        $this->_calculator = new BinaryCalculator();
    }

    public function tearDown()
    {
        $this->_calculator = null;
    }

    public static function binaryAdditionProvider()
    {
        return array(
            array('101', '101', '1010'),
            array('1', '10', '11'),
            array('100', '1001', '1101'),
            array('100', '100', '1000'),
            array('10000000000000000000000000000100', '01001000000000000000000000000100', '11001000000000000000000000001000')
        );
    }

    public function testInterfaceImplementation()
    {
        $this->assertInstanceOf('Tutor\Calculator\CalculatorInterface',
            $this->_calculator);
    }

    /**
     * @dataProvider binaryAdditionProvider
     */
    public function testBinaryAddition($a, $b, $c)
    {
        $this->assertEquals($c, $this->_calculator->add($a, $b));
    }

    public function testAddExceptionThrownIfFirstArgumentNotString()
    {
        $this->setExpectedException('Exception',
            'Binary number must be provided as string');
        $this->_calculator->add(10, '101');
    }

    public function testAddExceptionThrownIfSecondArgumentNotString()
    {
        $this->setExpectedException('Exception',
            'Binary number must be provided as string');
        $this->_calculator->add('101', 0010);
    }

    public function testBinaryRegex()
    {
        $this->assertEquals(1,
            preg_match($this->_calculator->getPattern(), '00101001'));
        $this->assertEquals(1,
            preg_match($this->_calculator->getPattern(), '10101001'));
        $this->assertEquals(0,
            preg_match($this->_calculator->getPattern(), 'nonsense'));
        $this->assertEquals(0, preg_match($this->_calculator->getPattern(), ''));
    }

    public function testAddExceptionThrownIfFirstArgumentNotBinaryString()
    {
        $this->setExpectedException('Exception', 'Invalid binary string');
        $this->_calculator->add('BOOYAH!', '101');
    }

    public function testAddExceptionThrownIfSecondArgumentNotBinaryString()
    {
        $this->setExpectedException('Exception', 'Invalid binary string');
        $this->_calculator->add('101', '');
    }

    public function testFirstArgumentExceedsBitSizeThrowsException()
    {
        $maximumBits = PHP_INT_SIZE * 8;
        $this->setExpectedException('Exception',
            "Binary number exceeds $maximumBits bits");
        $number = str_repeat('1', $maximumBits + 1);
        $this->_calculator->add($number, '101');
    }

    public function testSecondArgumentExceedsBitSizeThrowsException()
    {
        $maximumBits = PHP_INT_SIZE * 8;
        $this->setExpectedException('Exception',
            "Binary number exceeds $maximumBits bits");
        $number = str_repeat('1', $maximumBits + 1);
        $this->_calculator->add('101', $number);
    }

}
