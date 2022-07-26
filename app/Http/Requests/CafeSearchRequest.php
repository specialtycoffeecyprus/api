<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Parameter(name: 'q', in: 'query', required: true, allowEmptyValue: false, schema: new OA\Schema(type: 'string', maxLength: 255, minLength: 3))]
final class CafeSearchRequest extends FormRequest
{
    /** @return array{q: string[]} */
    public function rules(): array
    {
        return ['q' => ['required', 'string', 'between:3,255']];
    }
}
