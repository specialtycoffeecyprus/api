<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CafesNearestRequest;
use App\Http\Resources\CafeResource;
use App\Models\Cafe;

use function print_r;

class CafesNearestController extends Controller
{
    public function __invoke(CafesNearestRequest $request): CafeResource
    {
        $validated = $request->safe(['latitude', 'longitude']);
        [$latitude, $longitude] = [$validated['latitude'], $validated['longitude']];

        return new CafeResource(Cafe::orderByRaw('(latitude - ?) * (latitude - ?) + (longitude - ?) * (longitude - ?)', [$latitude, $latitude, $longitude, $longitude])->first());
    }
}
