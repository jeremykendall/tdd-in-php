<?php

namespace Tutor\Calculator;

/**
 * Tutor
 *
 * @category Tutor
 * @package Tutor_Calculator
 * @version $Id$
 */

/**
 * Simple binary arithmetic
 * 
 * @category Tutor
 * @package Tutor_Calculator
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
     * @param string $a
     * @param string $b
     * @return string
     */
    public function add($a, $b)
    {
        $this->_testArguments($a, $b);
        return decbin(bindec($a) + bindec($b));
    }
    
    private function _testArguments($a, $b)
    {
        $this->_testArgumentsAreStrings($a, $b);
        $this->_testArgumentsAreBinary($a, $b);
        $this->_testArgumentsDoNotExceedMaximumBitSize($a, $b);
    }
    
    private function _testArgumentsAreStrings($a, $b)
    {
        if (!is_string($a) || !is_string($b)) {
            throw new \Exception('Binary number must be provided as string');
        }
    }
    
    private function _testArgumentsAreBinary($a, $b)
    {
        if (0 === preg_match($this->_pattern, $a) || 
            0 === preg_match($this->_pattern, $b)) {
            throw new \Exception('Invalid binary string');
        }
    }
    
    private function _testArgumentsDoNotExceedMaximumBitSize($a, $b)
    {
        $maximumBits = PHP_INT_SIZE * 8;
        if (strlen($a) > $maximumBits || strlen($b) > $maximumBits)
        {
            throw new \Exception("Binary number exceeds $maximumBits bits");
        }
    }
    
    public function getPattern()
    {
        return $this->_pattern;
    }

}
