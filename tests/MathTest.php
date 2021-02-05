<?php
use PHPUnit\Framework\TestCase;

use function Brain\Math\calculate;
use function Brain\Math\isEven;

class MathTest extends TestCase
{
    public function testIsEven()
    {
        $arrEvenN = [-24, -6, 0, 6, 16, 120, 158, "2", "-2"];

        foreach ($arrEvenN as $num) {
            $this->assertTrue(isEven($num));
        }

        $arrNotEvenN = [-3, 1, 7, 5.5, 15, 131, "1", "-1"];

        foreach ($arrNotEvenN as $num) {
            $this->assertFalse(isEven($num));
        }

        $arrNotNumericTypes = ["qwe", "we", [], false, null];

        foreach ($arrNotNumericTypes as $notNum) {
            $this->assertFalse(isEven($notNum));
        }
    }

    public function testCalculate()
    {
        $this->assertEquals(5, calculate(2, 3, '+'));
        $this->assertEquals(363, calculate(12, 351, '+'));
        $this->assertEquals(-3, calculate(-5, 2, '+'));
        $this->assertEquals(-10, calculate(-6, -4, '+'));
        $this->assertEquals(-6, calculate(-8, -2, '-'));
        $this->assertEquals(-13, calculate(-9, 4, '-'));
        $this->assertEquals(2, calculate(6, 4, '-'));
        $this->assertEquals(19, calculate(60, 41, '-'));

        $this->expectException(Exception::class);
        calculate(50, 1, 'not operation');

    }
}
