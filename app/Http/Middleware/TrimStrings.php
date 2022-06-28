<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /** @var string[] */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
