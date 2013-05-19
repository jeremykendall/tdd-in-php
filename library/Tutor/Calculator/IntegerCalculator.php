<?php

/**
 * Tutor
 *
 * @category Tutor
 * @package  Tutor_MathTutor   
 */

/**
 * @namespace
 */
namespace Tutor\Calculator;

/**
 * Performs integer arithmetic
 * 
 * @category Tutor
 * @package  Tutor_Calculator
 */
class IntegerCalculator implements CalculatorInterface
{

    /**
     * Returns the sum of $augend and $addend
     *
     * @param  int $augend
     * @param  int $addend
     * @return int
     */
    public function add($augend, $addend)
    {
        $this->_testArguments($augend, $addend);
        $sum = $augend + $addend;
        $this->_testSum($sum);

        return $sum;
    }

    /**
     * Throws exception if either $augend or $addend are not integers
     *
     * @param  mixed     $augend
     * @param  mixed     $addend 
     * @throws Exception
     */
    private function _testArguments($augend, $addend)
    {
        if (!is_int($augend) || !is_int($addend)) {
            throw new \Exception('Non-integer argument provided');
        }
    }

    /**
     * Convenience wrapper for methods that test provided $sum
     * 
     * @param int $sum 
     */
    private function _testSum($sum)
    {
        $this->_testIntegerOverflow($sum);
        $this->_testIntegerUnderflow($sum);
    }

    /**
     * Tests sum against integer overflow
     * 
     * @param  mixed     $sum 
     * @throws Exception
     */
    private function _testIntegerOverflow($sum)
    {
        if (!is_int($sum) AND $sum > 0) {
            throw new \OverflowException('Integer overflow!');
        }
    }

    /**
     * Tests sum against integer underflow
     * 
     * @param  mixed     $sum 
     * @throws Exception
     */
    private function _testIntegerUnderflow($sum)
    {
        if (!is_int($sum) AND $sum < 0) {
            throw new \UnderflowException('Integer underflow!');
        }
    }

}
