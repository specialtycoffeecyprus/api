<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

#[OA\Info(version: '1.0.0', title: 'Specialty Coffee in Cyprus API')]
#[OA\Response(response: 'CafeCollectionResponse', description: 'Cafe Collection', content: new OA\JsonContent(ref: '#/components/schemas/CafeCollection'))]
#[OA\Response(response: 'CafeResourceResponse', description: 'Single Cafe', content: new OA\JsonContent(ref: '#/components/schemas/CafeResource'))]
#[OA\Response(response: 'BadRequestError', description: 'Bad Request')]
#[OA\Response(response: 'NotFoundError', description: 'Resource Not Found')]
#[OA\Response(response: 'ServerError', description: 'Server error')]
abstract class Controller extends BaseController
{
    use ValidatesRequests;
}
