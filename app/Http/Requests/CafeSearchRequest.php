<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CafeSearchRequest extends FormRequest
{
    /** @return array<string, string> */
    public function rules(): array
    {
        return ['q' => ['required', 'string', 'between:3,255']];
    }
}
