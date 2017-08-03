<?php

namespace Tutor\Calculator;

use PHPUnit\Framework\TestCase;

class IntegerCalculatorTest extends TestCase
{
    /**
     * @var IntegerCalculator
     */
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
        $this->assertInstanceOf(CalculatorInterface::class, $this->calculator);
    }

    /**
     * @dataProvider additionDataProvider
     *
     * @param $addend
     * @param $augend
     * @param $expected
     */
    public function testAddIntegers($addend, $augend, $expected)
    {
        $actual = $this->calculator->add($addend, $augend);
        $this->assertEquals($expected, $actual, 'Addition returned an incorrect result');
    }

    /**
     * @dataProvider nonIntegerArgumentDataProvider
     *
     * @param $addend
     * @param $augend
     */
    public function testExceptionThrownIfNonIntegerAddendProvided($addend, $augend)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Non-integer argument provided');
        $this->calculator->add($addend, $augend);
    }

    /**
     * @dataProvider nonIntegerArgumentDataProvider
     *
     * @param $addend
     * @param $augend
     */
    public function testExceptionThrownIfNonIntegerAugendProvided($addend, $augend)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Non-integer argument provided');
        $this->calculator->add($addend, $augend);
    }

    public function testIntegerOverflowThrowsException()
    {
        $this->expectException(\OverflowException::class);
        $this->expectExceptionMessage('Integer overflow!');
        $this->calculator->add(PHP_INT_MAX, 1);
    }

    public function testIntegerUnderflowThrowsException()
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('Integer underflow!');
        $this->calculator->add(PHP_INT_MAX * -1, -2);
    }

    public function additionDataProvider()
    {
        return [
            [2, 2, 4],
            [3, 2, 5],
            [-3, 2, -1],
        ];
    }

    public function nonIntegerArgumentDataProvider()
    {
        return [
            ['eff you', 12],
            [15, 'buddy'],
            [17.2, 12],
            [3, 22.5],
        ];
    }
}
