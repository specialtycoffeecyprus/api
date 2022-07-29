<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Spectator\Spectator;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->apiSchema = 'openapi.yaml';
    $this->endpoint = route('cafes.search');
});

test('can process request method', function (string $q, string $method, int $status): void {
    $this->$method($this->endpoint."?q=$q")->assertStatus($status);
})->with('Search queries')->with('Request methods');

test('fail if search query is invalid', function (string $query, string $error): void {
    $this->get($this->endpoint.'?'.$query)->assertInvalid(['q' => $error]);
})->with([
    'absent' => ['query' => '', 'error' => 'The q field is required.'],
    'empty' => ['query' => 'q=', 'error' => 'The q field is required.'],
    'too short' => ['query' => 'q=a', 'error' => 'The q must be between 3 and 255 characters.'],
    'too long' => ['query' => 'q='.Str::random(256), 'error' => 'The q must be between 3 and 255 characters.'],
]);

test('can search cafe', function (string $q): void {
    Spectator::using($this->apiSchema);

    $this->getJson($this->endpoint."?q=$q")->assertValidRequest()->assertValidResponse(Response::HTTP_OK);
})->with('Search queries');
