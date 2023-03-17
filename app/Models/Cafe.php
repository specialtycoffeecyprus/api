<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

final class Cafe extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * @return array{id: mixed, description: mixed, name: mixed, region: mixed}
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'name' => $this->name,
            'region' => $this->region,
        ];
    }
}
