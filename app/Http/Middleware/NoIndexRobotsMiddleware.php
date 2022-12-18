<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware;

final class NoIndexRobotsMiddleware extends RobotsMiddleware
{
    protected function shouldIndex(Request $request): bool
    {
        return false;
    }
}
