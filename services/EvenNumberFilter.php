<?php

namespace app\services;

use app\interfaces\NumberFilterInterface;

class EvenNumberFilter implements NumberFilterInterface
{
    public function filter(array $numbers): array
    {
        return array_values(array_filter($numbers, fn($n) => $n % 2 === 0));
    }
}
