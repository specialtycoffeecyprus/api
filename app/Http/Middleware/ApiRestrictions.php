<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

use function abort;
use function config;
use function in_array;

final class ApiRestrictions
{
    /**
     * Handle an incoming request.
     * @param Closure(Request): (Response|JsonResponse) $next
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $token = $request->bearerToken();
        if (in_array($token, config('auth.tokens'), true)) {
            return $next($request);
        }

        $forwardedIp = $request->header('X_FORWARDED_FOR');
        if ($forwardedIp === '') { // HTTP_X_FORWARDED_FOR is empty only from internal health checks
            return $next($request);
        }

        $origin = $request->header('origin');
        if (in_array($origin, config('cors.allowed_origins'), true)) {
            return $next($request);
        }

        abort(SymfonyResponse::HTTP_FORBIDDEN, SymfonyResponse::$statusTexts[SymfonyResponse::HTTP_FORBIDDEN]);
    }
}
