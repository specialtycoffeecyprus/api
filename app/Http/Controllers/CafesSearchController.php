<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CafeSearchRequest;
use App\Http\Resources\CafeCollection;
use App\Models\Cafe;
use OpenApi\Attributes as OA;

/** Search cafes */
#[OA\Get(path: '/cafes/search', parameters: [
    new OA\Parameter(ref: '#/components/parameters/q'),
], responses: [
    new OA\Response(ref: '#/components/responses/CafeCollectionResponse', response: 200),
    new OA\Response(ref: '#/components/responses/BadRequestError', response: 400),
    new OA\Response(ref: '#/components/responses/NotFoundError', response: 404),
    new OA\Response(ref: '#/components/responses/ServerError', response: 500),
])]
final class CafesSearchController extends Controller
{
    public function __invoke(CafeSearchRequest $request): CafeCollection
    {
        $q = $request->safe(['q'])['q'];

        return new CafeCollection(Cafe::search($q)->get());
    }
}
