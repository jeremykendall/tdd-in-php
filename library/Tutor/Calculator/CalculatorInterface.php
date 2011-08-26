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
 * Interface for Calculator implementations
 * 
 * @category Tutor
 * @package  Tutor_Calculator
 */
interface CalculatorInterface
{

    /**
     * Returns sum of $augend and $addend
     * 
     * @param $augend Number that will be added to
     * @param $addend Number that will be added to augend
     */
    public function add($augend, $addend);
}
