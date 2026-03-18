<?php

namespace tests\unit\services;

use app\services\SumCalculator;
use PHPUnit\Framework\TestCase;

class SumCalculatorTest extends TestCase
{
    private SumCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new SumCalculator();
    }

    public function testCalculateSum(): void
    {
        $this->assertSame(12, $this->calculator->calculate([2, 4, 6]));
    }

    public function testCalculateEmpty(): void
    {
        $this->assertSame(0, $this->calculator->calculate([]));
    }

    public function testCalculateSingleElement(): void
    {
        $this->assertSame(5, $this->calculator->calculate([5]));
    }

    public function testCalculateNegativeNumbers(): void
    {
        $this->assertSame(-3, $this->calculator->calculate([-1, -2]));
    }

    public function testCalculateFloats(): void
    {
        $this->assertSame(5.5, $this->calculator->calculate([2.5, 3.0]));
    }
}
