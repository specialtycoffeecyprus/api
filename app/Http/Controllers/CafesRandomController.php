<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeResource;
use App\Models\Cafe;

final class CafesRandomController extends Controller
{
    public function __invoke(): CafeResource
    {
        return new CafeResource(Cafe::inRandomOrder()->first());
    }
}
