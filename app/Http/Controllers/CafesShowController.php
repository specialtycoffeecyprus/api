<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CafeResource;
use App\Models\Cafe;
use OpenApi\Attributes as OA;

/** Show cafe */
#[OA\Get(path: '/cafes{cafe}', parameters: [
    new OA\Parameter(name: 'cafe', in: 'path', required: true, allowEmptyValue: false, schema: new OA\Schema(type: 'integer')),
], responses: [
    new OA\Response(ref: '#/components/responses/CafeResourceResponse', response: 200),
    new OA\Response(ref: '#/components/responses/BadRequestError', response: 400),
    new OA\Response(ref: '#/components/responses/NotFoundError', response: 404),
    new OA\Response(ref: '#/components/responses/ServerError', response: 500),
])]
final class CafesShowController extends Controller
{
    public function __invoke(Cafe $cafe): CafeResource
    {
        return new CafeResource($cafe);
    }
}
