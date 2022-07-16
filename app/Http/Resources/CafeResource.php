<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CafeResource extends JsonResource
{
    /**
     * @inheritDoc
     * @param Request $request
     * @return array{id: int, type: string, properties: array{name: string, description: string, placeId: string}, geometry: array{type: string, coordinates: float[]}}
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => 'Feature',
            'properties' => [
                'name' => $this->name,
                'description' => $this->description,
                //'code' => $this->code,
                'placeId' => $this->place_id,
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [
                    (float)$this->longitude,
                    (float)$this->latitude,
                ],
            ],
        ];
    }
}
