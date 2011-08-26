<?php

namespace Tutor;

/**
 * Description of MathTutor
 *
 * @category
 * @package
 * @subpackage
 * @version     $Id$
 */

/**
 * @category
 * @package
 * @subpackage
 */
class MathTutor
{
    /**
     * @var Tutor\Calculator\CalculatorInterface
     */
    private $_calculator;
    
    public function __construct(Calculator\CalculatorInterface $calculator)
    {
        $this->_calculator = $calculator;
    }
    
    public function gradeResponse($a, $b, $result)
    {
        return $result === $this->_calculator->add($a, $b);
    }
}
