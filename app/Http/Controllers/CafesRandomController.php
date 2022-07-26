<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeResource;
use App\Models\Cafe;
use OpenApi\Attributes as OA;

/** Get random cafe */
#[OA\Get(path: '/cafes/random', responses: [
    new OA\Response(ref: '#/components/responses/CafeResourceResponse', response: 200),
    new OA\Response(ref: '#/components/responses/BadRequestError', response: 400),
    new OA\Response(ref: '#/components/responses/NotFoundError', response: 404),
    new OA\Response(ref: '#/components/responses/ServerError', response: 500),
])]
final class CafesRandomController extends Controller
{
    public function __invoke(): CafeResource
    {
        return new CafeResource(Cafe::inRandomOrder()->first());
    }
}
