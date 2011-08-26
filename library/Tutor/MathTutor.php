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
namespace Tutor;

use Tutor\Calculator\CalculatorInterface;

/**
 * Math tutor compares result of addition to user response
 * 
 * @category Tutor
 * @package  Tutor_MathTutor
 */
class MathTutor
{

    /**
     * @var CalculatorInterface
     */
    private $_calculator;

    /**
     * Constructor
     * 
     * @param CalculatorInterface $calculator 
     */
    public function __construct(CalculatorInterface $calculator)
    {
        $this->_calculator = $calculator;
    }

    /**
     * Tests $response against the sum of the $augend and $addend
     *
     * @param  mixed   $augend
     * @param  mixed   $addend
     * @param  mixed   $response
     * @return boolean 
     */
    public function gradeResponse($augend, $addend, $response)
    {
        return $response === $this->_calculator->add($augend, $addend);
    }

}
