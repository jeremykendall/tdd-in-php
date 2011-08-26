<?php

/**
 * Tutor
 *
 * @category Tutor
 * @package  Tutor_Calculator
 */

namespace Tutor\Calculator;

/**
 * Performs simple binary arithmetic
 * 
 * @category Tutor
 * @package  Tutor_Calculator
 */
class BinaryCalculator implements CalculatorInterface
{

    /**
     * @var string Default binary regex
     */
    private $_pattern = '/^(0|1){1,}$/';

    /**
     * Returns sum of binary strings
     * 
     * @param  string $augend
     * @param  string $addend
     * @return string
     */
    public function add($augend, $addend)
    {
        $this->_testArguments($augend, $addend);
        return decbin(bindec($augend) + bindec($addend));
    }

    /**
     * Convenience wrapper for argument test methods
     *
     * @param string $augend
     * @param string $addend 
     */
    private function _testArguments($augend, $addend)
    {
        $this->_testArgumentsAreStrings($augend, $addend);
        $this->_testArgumentsAreBinary($augend, $addend);
        $this->_testArgumentsDoNotExceedMaximumBitSize($augend, $addend);
    }

    /**
     * Tests if arguments are strings
     * 
     * @param string $augend
     * @param string $addend 
     * @throws Exception
     */
    private function _testArgumentsAreStrings($augend, $addend)
    {
        if (!is_string($augend) || !is_string($addend)) {
            throw new \Exception('Binary number must be provided as string');
        }
    }

    /**
     * Tests if arguments are string representation of binary numbers
     * 
     * @param string $augend
     * @param string $addend 
     * @throws Exception
     */
    private function _testArgumentsAreBinary($augend, $addend)
    {
        if (0 === preg_match($this->_pattern, $augend) ||
            0 === preg_match($this->_pattern, $addend)) {
            throw new \Exception('Invalid binary string');
        }
    }

    /**
     * Tests if arguments exceed maximum bit size
     * 
     * @param string $augend
     * @param string $addend 
     * @throws Exception
     */
    private function _testArgumentsDoNotExceedMaximumBitSize($augend, $addend)
    {
        $maximumBits = PHP_INT_SIZE * 8;
        if (strlen($augend) > $maximumBits || strlen($addend) > $maximumBits) {
            throw new \Exception("Binary number exceeds $maximumBits bits");
        }
    }

    public function getPattern()
    {
        return $this->_pattern;
    }

}
