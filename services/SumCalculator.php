<?php

namespace app\services;

use app\interfaces\SumCalculatorInterface;

class SumCalculator implements SumCalculatorInterface
{
    public function calculate(array $numbers): int|float
    {
        return array_sum($numbers);
    }
}
