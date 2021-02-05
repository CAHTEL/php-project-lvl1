<?php
use PHPUnit\Framework\TestCase;

use function Brain\Math\calculate;
use function Brain\Math\generateArithmeticProgression;
use function Brain\Math\getGreatestCommonDivisor;
use function Brain\Math\getPassElementFromProgression;
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

    public function testGetGreatestCommonDivisor()
    {
        $this->assertEquals(1, getGreatestCommonDivisor(2, 3));
        $this->assertEquals(3, getGreatestCommonDivisor(12, 351));
        $this->assertEquals(1, getGreatestCommonDivisor(-5, 2));
        $this->assertEquals(2, getGreatestCommonDivisor(-6, -4));
        $this->assertEquals(2, getGreatestCommonDivisor(-8, -2));
        $this->assertEquals(1, getGreatestCommonDivisor(-9, 4));
        $this->assertEquals(2, getGreatestCommonDivisor(6, 4));
        $this->assertEquals(60, getGreatestCommonDivisor(60, 0));
    }

    public function testGenerateArithmeticProgression()
    {
        $this->assertEquals([2, 5, 8, 11, 14, 17], generateArithmeticProgression(2, 3, 6));
        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9], generateArithmeticProgression(1, 1, 9));
    }

    public function testGetPassElementFromProgression()
    {
        $arr1 = [1, 2, 3, 4, 5, '..', 7, 8, 9];
        $arr2 = ['..', 8, 14, 20, 26];
        $arr3 = [2, 5, 8, 11, 14, '..'];
        $this->assertEquals(6, getPassElementFromProgression($arr1));
        $this->assertEquals(2, getPassElementFromProgression($arr2));
        $this->assertEquals(17, getPassElementFromProgression($arr3));
    }
}
