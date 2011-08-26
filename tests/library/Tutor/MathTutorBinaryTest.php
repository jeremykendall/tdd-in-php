<?php

namespace Tutor;
use Tutor\Calculator\BinaryCalculator;

class MathTutorBinaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MathTutor
     */
    private $_tutor;
    
    /**
     * @var BinaryCalculator
     */
    private $_calculator;
    
    public function setUp()
    {
        parent::setUp();
        $this->_calculator = $this->getMock('Tutor\Calculator\BinaryCalculator');
        $this->_tutor = new MathTutor($this->_calculator);
    }

    public function testGradeCorrectBinaryResponse()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with('100', '100')
            ->will($this->returnValue('1000'));
        
        $this->assertTrue($this->_tutor->gradeResponse('100', '100', '1000'));
    }
    
    public function testGradeIncorrectBinaryResponse()
    {
        $this->_calculator->expects($this->once())
            ->method('add')
            ->with('0101', '0101')
            ->will($this->returnValue('1010'));
        
        $this->assertFalse($this->_tutor->gradeResponse('0101', '0101', '00001010101110001011'));
    }

}
