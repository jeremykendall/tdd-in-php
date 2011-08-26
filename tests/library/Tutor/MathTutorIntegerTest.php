<?php

namespace Tutor;
use Tutor\Calculator\IntegerCalculator;

class MathTutorIntegerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MathTutor
     */
    private $_tutor;
    
    /**
     * @var IntegerCalculator
     */
    private $_calculator;

    public function setUp()
    {
        parent::setUp();
        $this->_calculator = $this->getMock('Tutor\Calculator\IntegerCalculator');
        $this->_tutor = new MathTutor($this->_calculator);
    }

    public function tearDown()
    {
        $this->_tutor = null;
        $this->_calculator = null;
        parent::tearDown();
    }

    public function testGradeCorrectIntegerResult()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with(987, 2334)
            ->will($this->returnValue(3321));
        
        $this->assertTrue($this->_tutor->gradeResponse(987, 2334, 3321));
    }

    public function testGradeIncorrectIntegerResult()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with(75, 622)
            ->will($this->returnValue(697));
        
        $this->assertFalse($this->_tutor->gradeResponse(75, 622, 775));
    }

    public function testGradeNonsenseResult()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with(10, 10)
            ->will($this->returnValue(20));
        
        $this->assertFalse($this->_tutor->gradeResponse(10, 10, 'I hate math!'));
    }
    
    public function testGradeBooleanTrueResult()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with(52, 48)
            ->will($this->returnValue(100));
        
        $this->assertFalse($this->_tutor->gradeResponse(52, 48, true));
    }

}
