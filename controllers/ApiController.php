<?php

namespace app\controllers;

use app\dto\NumbersRequestDto;
use app\services\EvenNumberFilter;
use app\services\SumCalculator;
use app\services\SumEvenService;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionSumEven(): array
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $body = \Yii::$app->request->getBodyParams();

        if (!isset($body['numbers']) || !is_array($body['numbers'])) {
            \Yii::$app->response->statusCode = 400;
            return ['error' => 'Field "numbers" is required and must be an array.'];
        }

        $dto = NumbersRequestDto::fromArray($body);

        if (!$dto->validate()) {
            \Yii::$app->response->statusCode = 422;
            return ['errors' => $dto->getErrors()];
        }

        $service = new SumEvenService(
            new EvenNumberFilter(),
            new SumCalculator(),
        );

        return ['sum' => $service->calculate($dto)];
    }
}
