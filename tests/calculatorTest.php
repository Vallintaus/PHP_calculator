<?php

use PHPUnit\Framework\TestCase;
use Calculator\Calculator;

class CalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    protected function tearDown(): void
    {
        $this->calculator = NULL;
    }

    public static function addDataProvider()
    {
        return array(
            array(5, 3, 8),
            array(8, 13, 21),
            array(0, 0, 0),
            array(6, -8, -2),
        );
    }

    /**
     * @dataProvider addDataProvider
     */

    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }


    public function testSubtract()
    {
        $result = $this->calculator->subtract(6, 2);
        $this->assertEquals(4, $result);
    }

    public function testSubtractNegative()
    {
        $result = $this->calculator->subtract(6, -2);
        $this->assertEquals(8, $result);
    }

    public function testMultiply()
    {
        $result = $this->calculator->multiply(3, 3);
        $this->assertEquals(9, $result);
    }

    public function testMultiplyWithZero()
    {
        $result = $this->calculator->multiply(3, 0);
        $this->assertEquals(0, $result);
    }

    public function testDivide()
    {
        $result = $this->calculator->divide(6, 3);
        $this->assertEquals(2, $result);
    }

    public function testDivideByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->divide(6, 0);
    }

    public function testDividezero()
    {
        $result = $this->calculator->divide(0, 8);
        $this->assertEquals(0, $result);
    }
}
