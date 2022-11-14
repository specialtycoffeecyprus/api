<?php

declare(strict_types=1);

use Illuminate\Support\Str;

dataset('Search queries', static fn (): array => [
    'non-exist' => Str::random(),
    'exist' => 'paul',
]);
