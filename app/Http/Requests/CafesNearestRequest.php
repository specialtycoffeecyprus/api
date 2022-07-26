<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Parameter(name: 'latitude', in: 'query', required: true, allowEmptyValue: false, schema: new OA\Schema(type: 'string', format: 'float', maximum: 90, minimum: -90))]
#[OA\Parameter(name: 'longitude', in: 'query', required: true, allowEmptyValue: false, schema: new OA\Schema(type: 'string', format: 'float', maximum: 180, minimum: -180))]
final class CafesNearestRequest extends FormRequest
{
    /** @return array{latitude: string[], longitude: string[]} */
    public function rules(): array
    {
        return [
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ];
    }
}
