<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CafesNearestRequest;
use App\Http\Resources\CafeResource;
use App\Models\Cafe;
use OpenApi\Attributes as OA;

/** Lookup nearest cafe */
#[OA\Get(path: '/cafes/nearest', parameters: [
    new OA\Parameter(ref: '#/components/parameters/latitude'),
    new OA\Parameter(ref: '#/components/parameters/longitude'),
], responses: [
    new OA\Response(ref: '#/components/responses/CafeResourceResponse', response: 200),
    new OA\Response(ref: '#/components/responses/BadRequestError', response: 400),
    new OA\Response(ref: '#/components/responses/NotFoundError', response: 404),
    new OA\Response(ref: '#/components/responses/ServerError', response: 500),
])]
final class CafesNearestController extends Controller
{
    public function __invoke(CafesNearestRequest $request): CafeResource
    {
        $validated = $request->safe(['latitude', 'longitude']);
        [$latitude, $longitude] = [$validated['latitude'], $validated['longitude']];

        return new CafeResource(Cafe::orderByRaw('(latitude - ?) * (latitude - ?) + (longitude - ?) * (longitude - ?)', [$latitude, $latitude, $longitude, $longitude])->first());
    }
}
