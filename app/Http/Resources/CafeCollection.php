<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class CafeCollection extends ResourceCollection
{
    /** @param Request $request */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->collection,
        ];
    }
}
