<?php

namespace Tutor\Calculator;

class IntegerCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    protected function setUp()
    {
        parent::setUp();
        $this->calculator = new IntegerCalculator();
    }

    protected function tearDown()
    {
        $this->calculator = null;
        parent::tearDown();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf('Tutor\Calculator\CalculatorInterface', $this->calculator);
    }

    /**
     * @dataProvider additionDataProvider
     */
    public function testAddIntegers($addend, $augend, $expected)
    {
        $actual = $this->calculator->add($addend, $augend);
        $this->assertEquals($expected, $actual, 'Addition returned an incorrect result');
    }

    /**
     * @dataProvider nonIntegerArgumentDataProvider
     */
    public function testExceptionThrownIfNonIntegerAddendProvided($addend, $augend)
    {
        $this->setExpectedException('\InvalidArgumentException', 'Non-integer argument provided');
        $this->calculator->add($addend, $augend);
    }

    /**
     * @dataProvider nonIntegerArgumentDataProvider
     */
    public function testExceptionThrownIfNonIntegerAugendProvided($addend, $augend)
    {
        $this->setExpectedException('\InvalidArgumentException', 'Non-integer argument provided');
        $this->calculator->add($addend, $augend);
    }

    public function testIntegerOverflowThrowsException()
    {
        $this->setExpectedException('\OverflowException', 'Integer overflow!');
        $this->calculator->add(PHP_INT_MAX, 1);
    }

    public function testIntegerUnderflowThrowsException()
    {
        $this->setExpectedException('\UnderflowException', 'Integer underflow!');
        $this->calculator->add((PHP_INT_MAX * -1), -2);
    }

    public function additionDataProvider()
    {
        return array(
            array(2, 2, 4),
            array(3, 2, 5),
            array(-3, 2, -1),
        );
    }

    public function nonIntegerArgumentDataProvider()
    {
        return array(
            array('eff you', 12),
            array(15, 'buddy'),
            array(17.2, 12),
            array(3, 22.5),
        );
    }
}
