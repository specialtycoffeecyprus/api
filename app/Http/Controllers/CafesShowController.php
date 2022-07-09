<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeResource;
use App\Models\Cafe;

class CafesShowController extends Controller
{
    public function __invoke(Cafe $cafe): CafeResource
    {
        return new CafeResource($cafe);
    }
}
