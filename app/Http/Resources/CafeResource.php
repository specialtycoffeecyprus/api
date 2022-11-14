<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(title: 'CafeResource (Coffee shop)', required: ['id', 'type', 'properties'], properties: [
    new OA\Property(property: 'id', title: 'ID', type: 'integer'),
    new OA\Property(property: 'type', title: 'Type', type: 'string', enum: ['Feature']),
    new OA\Property(property: 'properties', title: 'Properties', required: ['name', 'description', 'placeId'], properties: [
        new OA\Property(property: 'name', title: 'Name', type: 'string'),
        new OA\Property(property: 'description', title: 'Description', type: 'string'),
        new OA\Property(property: 'placeId', title: 'Google Place ID', type: 'string'),
    ], type: 'object'),
    new OA\Property(property: 'geometry', title: 'Geometry', required: ['type', 'coordinates'], properties: [
        new OA\Property(property: 'type', title: 'Type', type: 'string', enum: ['Point']),
        new OA\Property(property: 'coordinates', title: 'Coordinates', type: 'array', items: new OA\Items(type: 'number', format: 'float')),
    ], type: 'object'),
], type: 'object')]
final class CafeResource extends JsonResource
{
    /**
     * @inheritDoc
     * @param Request $request
     * @return array{id: int, type: string, properties: array{name: string, description: string, placeId: string}, geometry: array{type: string, coordinates: array<float>}}
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
                    (float) $this->longitude,
                    (float) $this->latitude,
                ],
            ],
        ];
    }
}
