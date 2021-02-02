<?php
use PHPUnit\Framework\TestCase;

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
}
