<?php

declare(strict_types=1);

return [
    'default' => env('SPEC_SOURCE', 'local'),
    'sources' => [
        'local' => [
            'source' => 'local',
            'base_path' => env('SPEC_PATH'),
        ],
        'remote' => [
            'source' => 'remote',
            'base_path' => env('SPEC_PATH'),
            'params' => env('SPEC_URL_PARAMS', ''),
        ],
        'github' => [
            'source' => 'github',
            'base_path' => env('SPEC_GITHUB_PATH'),
            'repo' => env('SPEC_GITHUB_REPO'),
            'token' => env('SPEC_GITHUB_TOKEN'),
        ],
    ],
    'path_prefix' => '',
    'suppress_errors' => false,
];
