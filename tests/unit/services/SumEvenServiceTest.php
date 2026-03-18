<?php

namespace tests\unit\services;

use app\dto\NumbersRequestDto;
use app\services\EvenNumberFilter;
use app\services\SumCalculator;
use app\services\SumEvenService;
use PHPUnit\Framework\TestCase;

class SumEvenServiceTest extends TestCase
{
    private SumEvenService $service;

    protected function setUp(): void
    {
        $this->service = new SumEvenService(
            new EvenNumberFilter(),
            new SumCalculator(),
        );
    }

    public function testCalculateSumOfEvenNumbers(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1, 2, 3, 4, 5, 6]]);
        $this->assertSame(12, $this->service->calculate($dto));
    }

    public function testCalculateNoEvenNumbers(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1, 3, 5]]);
        $this->assertSame(0, $this->service->calculate($dto));
    }

    public function testCalculateEmptyArray(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => []]);
        $this->assertSame(0, $this->service->calculate($dto));
    }

    public function testCalculateAllEven(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [2, 4, 6, 8]]);
        $this->assertSame(20, $this->service->calculate($dto));
    }

    public function testCalculateWithNegativeEven(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [-2, 3, 4]]);
        $this->assertSame(2, $this->service->calculate($dto));
    }

    public function testCalculateWithZero(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [0, 1, 2]]);
        $this->assertSame(2, $this->service->calculate($dto));
    }
}
