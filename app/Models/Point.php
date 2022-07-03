<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Point as PointCast;
use Illuminate\Contracts\Database\Eloquent\Castable;

class Point implements Castable
{
    public function __construct(public string $latitude, public string $longitude)
    {
    }


    public static function castUsing(array $arguments): string
    {
        return PointCast::class;
    }
}
