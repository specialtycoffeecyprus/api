<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\Middleware\ApiRestrictions;
use App\Http\Middleware\JsonResponse;
use App\Http\Middleware\NoIndexRobotsMiddleware;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustProxies;
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
    protected $middleware = [
        NoIndexRobotsMiddleware::class,
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'api' => [
            ThrottleRequests::class.':api',
            SubstituteBindings::class,
            JsonResponse::class,
            ApiRestrictions::class,
        ],
    ];

    protected $middlewareAliases = [
        'cache.headers' => SetCacheHeaders::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
    ];
}
