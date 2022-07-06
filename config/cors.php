<?php

declare(strict_types=1);

return [
    'paths' => ['*'],
    'allowed_methods' => ['GET'],
    'allowed_origins' => [env('CORS_ORIGIN', '*')],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
