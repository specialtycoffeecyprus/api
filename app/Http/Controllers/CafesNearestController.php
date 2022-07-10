<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CafesNearestRequest;
use App\Http\Resources\CafeCollection;
use App\Models\Cafe;

class CafesNearestController extends Controller
{
    public function __invoke(CafesNearestRequest $request): CafeCollection
    {
        $validated = $request->safe(['latitude', 'longitude']);
        [$latitude, $longitude] = [$validated['latitude'], $validated['longitude']];

        return new CafeCollection(Cafe::orderByRaw('(latitude - ?) * (latitude - ?) + (longitude - ?) * (longitude - ?)', [$latitude, $latitude, $longitude, $longitude])->take(1)->get());
    }
}
