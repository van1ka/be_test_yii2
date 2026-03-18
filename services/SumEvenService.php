<?php

namespace app\services;

use app\dto\NumbersRequestDto;
use app\interfaces\NumberFilterInterface;
use app\interfaces\SumCalculatorInterface;

class SumEvenService
{
    public function __construct(
        private NumberFilterInterface $filter,
        private SumCalculatorInterface $calculator,
    ) {}

    public function calculate(NumbersRequestDto $dto): int|float
    {
        $evenNumbers = $this->filter->filter($dto->numbers);
        return $this->calculator->calculate($evenNumbers);
    }
}
