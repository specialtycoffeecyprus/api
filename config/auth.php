<?php

declare(strict_types=1);

return [
    'tokens' => [
        env('AUTH_TOKEN_BOT'),
        env('AUTH_TOKEN_UPTIME'),
    ],

    //'defaults' => [
    //    'guard' => 'api',
    //],
    //
    //'guards' => [
    //    'web' => [
    //        'driver' => 'session',
    //        'provider' => 'users',
    //    ],
    //    'api' => [
    //        'driver' => 'session'
    //    ],
    //],
];
