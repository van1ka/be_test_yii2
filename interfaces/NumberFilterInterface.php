<?php

namespace app\interfaces;

interface NumberFilterInterface
{
    /**
     * @param array<int|float> $numbers
     * @return array<int|float>
     */
    public function filter(array $numbers): array;
}
