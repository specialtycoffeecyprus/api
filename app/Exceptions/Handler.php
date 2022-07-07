<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(static function (Throwable $e): void {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
    }
}
