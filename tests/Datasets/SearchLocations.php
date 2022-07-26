<?php

declare(strict_types=1);

dataset('Search locations', static fn(): array => [
    'random' => ['latitude' => random_int(-90, 90), 'longitude' => random_int(180, 180)],
]);
