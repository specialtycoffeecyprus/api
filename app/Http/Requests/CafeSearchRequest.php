<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CafeSearchRequest extends FormRequest
{
    /** @return array{q: string[]} */
    public function rules(): array
    {
        return ['q' => ['required', 'string', 'between:3,255']];
    }
}
