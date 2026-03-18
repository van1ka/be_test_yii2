<?php

namespace app\dto;

use yii\base\Model;

class NumbersRequestDto extends Model
{
    public array $numbers = [];

    public function rules(): array
    {
        return [
            ['numbers', 'required'],
            ['numbers', 'each', 'rule' => ['number']],
        ];
    }

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->numbers = $data['numbers'] ?? [];
        return $dto;
    }
}
