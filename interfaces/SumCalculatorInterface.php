<?php

namespace app\interfaces;

interface SumCalculatorInterface
{
    /**
     * @param array<int|float> $numbers
     * @return int|float
     */
    public function calculate(array $numbers): int|float;
}
