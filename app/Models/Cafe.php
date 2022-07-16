<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

final class Cafe extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    /** @inheritdoc */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
