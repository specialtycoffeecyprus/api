<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse as BaseJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class JsonResponse
{
    /**
     * Handle an incoming request
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return BaseJsonResponse
     */
    public function handle(Request $request, Closure $next): BaseJsonResponse
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
