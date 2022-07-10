<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CafeResource extends JsonResource
{
    /**
     * @inheritDoc
     * @param Request $request
     */
    public function toArray($request): array|JsonSerializable|Arrayable
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
