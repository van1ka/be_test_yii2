<?php

namespace tests\unit\services;

use app\services\EvenNumberFilter;
use PHPUnit\Framework\TestCase;

class EvenNumberFilterTest extends TestCase
{
    private EvenNumberFilter $filter;

    protected function setUp(): void
    {
        $this->filter = new EvenNumberFilter();
    }

    public function testFilterEvenNumbers(): void
    {
        $result = $this->filter->filter([1, 2, 3, 4, 5, 6]);
        $this->assertSame([2, 4, 6], $result);
    }

    public function testFilterAllOdd(): void
    {
        $result = $this->filter->filter([1, 3, 5, 7]);
        $this->assertSame([], $result);
    }

    public function testFilterAllEven(): void
    {
        $result = $this->filter->filter([2, 4, 6]);
        $this->assertSame([2, 4, 6], $result);
    }

    public function testFilterEmpty(): void
    {
        $result = $this->filter->filter([]);
        $this->assertSame([], $result);
    }

    public function testFilterNegativeNumbers(): void
    {
        $result = $this->filter->filter([-2, -3, -4]);
        $this->assertSame([-2, -4], $result);
    }

    public function testFilterWithZero(): void
    {
        $result = $this->filter->filter([0, 1, 2]);
        $this->assertSame([0, 2], $result);
    }
}
