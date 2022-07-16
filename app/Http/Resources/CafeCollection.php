<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

final class CafeCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array{type: string, features: Collection}
     */
    public function toArray($request): array
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $this->collection,
        ];
    }
}
