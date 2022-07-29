<?php

declare(strict_types=1);

use Spectator\Spectator;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->endpoint = route('cafes.random');
});

test('can process request method', function (string $method, int $status): void {
    $this->$method($this->endpoint)->assertStatus($status);
})->with('Request methods');

test('can get random cafe', function (): void {
    Spectator::using($this->apiSchema);

    $this->getJson($this->endpoint)->assertValidRequest()->assertValidResponse(Response::HTTP_OK);
});
