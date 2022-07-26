<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeCollection;
use App\Models\Cafe;
use OpenApi\Attributes as OA;

/** List cafes */
#[OA\Get(path: '/cafes', responses: [
    new OA\Response(ref: '#/components/responses/CafeCollectionResponse', response: 200),
    new OA\Response(ref: '#/components/responses/BadRequestError', response: 400),
    new OA\Response(ref: '#/components/responses/NotFoundError', response: 404),
    new OA\Response(ref: '#/components/responses/ServerError', response: 500),
])]
final class CafesIndexController extends Controller
{
    public function __invoke(): CafeCollection
    {
        return new CafeCollection(Cafe::all());
    }
}
