<?php

declare(strict_types=1);

use Spectator\Spectator;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->apiSchema = 'openapi.yaml';
    $this->endpoint = route('cafes.index');
});

test('can process request method', function (string $method, int $status) {
    $this->$method($this->endpoint)->assertStatus($status);
})->with('Request methods');

test('can list cafes', function () {
    Spectator::using($this->apiSchema);

    $this->getJson($this->endpoint)->assertValidRequest()->assertValidResponse(Response::HTTP_OK);
});
