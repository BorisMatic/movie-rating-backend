<?php

// Created By @hoaaah * Copyright (c) 2020 belajararief.com
return [
    'useHttpBasicAuth' => true,
    'useHttpBearerAuth' => true,
    'useQueryParamAuth' => true,

    /**
     * use rate limiter for user
     * you must modified your UserIdentity class, follow this guidelines for complete guide
     * https://www.yiiframework.com/doc/guide/2.0/en/rest-rate-limiting
     */
    'useRateLimiter' => false,
    'corsFilter' => [
        'class' => \yii\filters\Cors::class,
        'cors' => [
            'Origin' => ['http://localhost:4200'],
            'Access-Control-Request-Method' => ['POST'],
            'Access-Control-Request-Headers' => ['X-Wsse', 'Content-Type'],
            'Access-Control-Allow-Credentials' => true,
            'Access-Control-Max-Age' => 3600,
            'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
        ],

    ]
];
