<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse as BaseJsonResponse;
use Illuminate\Http\Request;

final class JsonResponse
{
    /** @param Closure(Request): (BaseJsonResponse) $next */
    public function handle(Request $request, Closure $next): BaseJsonResponse
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
