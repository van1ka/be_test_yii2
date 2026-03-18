<?php

$config = [
    'id' => 'sum-even-api',
    'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            'cookieValidationKey' => 'sum-even-api-secret-key',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'POST api/sum-even' => 'api/sum-even',
                '/' => 'site/index',
            ],
        ],
    ],
];

return $config;
