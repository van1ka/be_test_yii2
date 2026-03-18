<?php

namespace tests\unit\dto;

use app\dto\NumbersRequestDto;
use PHPUnit\Framework\TestCase;

class NumbersRequestDtoTest extends TestCase
{
    public function testFromArray(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1, 2, 3]]);
        $this->assertSame([1, 2, 3], $dto->numbers);
    }

    public function testFromArrayMissingNumbers(): void
    {
        $dto = NumbersRequestDto::fromArray([]);
        $this->assertSame([], $dto->numbers);
    }

    public function testValidateSuccess(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1, 2, 3]]);
        $this->assertTrue($dto->validate());
    }

    public function testValidateEmpty(): void
    {
        $dto = new NumbersRequestDto();
        $dto->numbers = [];
        $this->assertFalse($dto->validate());
    }

    public function testValidateNonNumericElements(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1, 'abc', 3]]);
        $this->assertFalse($dto->validate());
    }

    public function testValidateFloats(): void
    {
        $dto = NumbersRequestDto::fromArray(['numbers' => [1.5, 2.0, 3.7]]);
        $this->assertTrue($dto->validate());
    }
}
