<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
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
        Log::debug(print_r($_SERVER, true));
        $token = $request->bearerToken();
        if (in_array($token, config('auth.tokens'), true)) {
            return $next($request);
        }

        $forwardedIp = $request->header('X_FORWARDED_FOR');
        if ($forwardedIp === '') { // HTTP_X_FORWARDED_FOR is empty only from internal health checks
            return $next($request);
        }

        $referer = $request->header('referer');
        $referer = $referer !== null ? trim((string) $referer, '/') : $referer;
        if (in_array($referer, config('cors.allowed_origins'), true)) {
            return $next($request);
        }

        abort(SymfonyResponse::HTTP_FORBIDDEN, SymfonyResponse::$statusTexts[SymfonyResponse::HTTP_FORBIDDEN]);
    }
}
