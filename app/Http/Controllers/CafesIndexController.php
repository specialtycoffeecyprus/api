<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeCollection;
use App\Models\Cafe;

final class CafesIndexController extends Controller
{
    public function __invoke(): CafeCollection
    {
        return new CafeCollection(Cafe::all());
    }
}
