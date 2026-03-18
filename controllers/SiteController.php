<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionIndex(): array
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'name' => 'Sum Even API',
            'version' => '1.0.0',
            'endpoints' => [
                'POST /api/sum-even' => 'Returns the sum of even numbers from the given array',
            ],
        ];
    }
}
