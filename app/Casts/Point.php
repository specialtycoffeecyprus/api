<?php

declare(strict_types=1);

namespace App\Casts;

use App\Models\Point as PointModel;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

use function explode;
use function implode;

class Point implements CastsAttributes
{
    public function get($model, string $key, mixed $value, array $attributes): PointModel
    {
        [$latitude, $longitude] = explode(', ', $attributes['position']);

        return new PointModel($latitude, $longitude);
    }


    /** @param Point $value */
    public function set($model, string $key, mixed $value, array $attributes): string
    {
        if (!$value instanceof PointModel) {
            throw new InvalidArgumentException('The given value is not an Point instance');
        }

        return implode(',', [
            $value->latitude,
            $value->longitude,
        ]);
    }
}
