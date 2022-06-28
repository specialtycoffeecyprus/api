<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeResource;
use App\Models\Cafe;

class CafesIndexController extends Controller
{
    public function __invoke(): CafeResource
    {
        return CafeResource::make(Cafe::all());
    }
}
