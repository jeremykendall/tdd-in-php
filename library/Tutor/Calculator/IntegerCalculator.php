<?php

namespace Tutor\Calculator;

class IntegerCalculator implements CalculatorInterface
{
    public function add($addend, $augend)
    {
        if (!is_integer($addend) || !is_integer($augend)) {
            throw new \InvalidArgumentException('Non-integer argument provided');
        }
        
        $sum = $addend + $augend;

        if (is_float($sum) && $sum > 0) {
            throw new \OverflowException('Integer overflow!');
        }

        if (is_float($sum) && $sum < 0) {
            throw new \UnderflowException('Integer underflow!');
        }

        return $sum;
    }
}
