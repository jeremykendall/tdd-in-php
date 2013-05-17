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
        var_dump($sum);
        var_dump(PHP_INT_MAX);
        
        if ($sum > PHP_INT_MAX) {
            throw new \OverflowException('Integer overflow!');
        }

        return $sum;
    }
}
