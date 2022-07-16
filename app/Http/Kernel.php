<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\Middleware\JsonResponse;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\ValidateSignature;

final class Kernel extends HttpKernel
{
    /** @var string[] */
    protected $middleware = [
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
        JsonResponse::class,
    ];

    /** @var string[][] */
    protected $middlewareGroups = [
        'api' => [
            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /** @var string[] */
    protected $routeMiddleware = [
        'cache.headers' => SetCacheHeaders::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
    ];
}
