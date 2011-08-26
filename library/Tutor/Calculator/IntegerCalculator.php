<?php

namespace Tutor\Calculator;

class IntegerCalculator implements CalculatorInterface
{

    public function add($a, $b)
    {
        $this->_testArguments($a, $b);
        $result = $a + $b;
        $this->_testResult($result);

        return $result;
    }
    
    private function _testArguments($a, $b)
    {
        if (!is_int($a) || !is_int($b)) {
            throw new \Exception('Non-integer argument provided');
        }
    }
    
    private function _testResult($result)
    {
        $this->_testOverflow($result);
        $this->_testUnderflow($result);
    }
    
    private function _testOverflow($result)
    {
        if ($result > PHP_INT_MAX) {
            throw new \Exception('Integer overflow!');
        }
    }
    
    private function _testUnderflow($result)
    {
        if ($result < (PHP_INT_MAX * -1) - 1) {
            throw new \Exception('Integer underflow!');
        }
    }

}
