<?php

declare(strict_types=1);

use Illuminate\Support\Str;

test('should answer not found on url by request method', function (string $url, string $method) {
    $this->$method($url)->assertNotFound();
})->with(['/', Str::random(5)])->with('Request methods');
