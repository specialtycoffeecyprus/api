<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->endpoint = route('cafes.random');
});


test('can process request method', function (string $method, int $status) {
    $this->$method($this->endpoint)->assertStatus($status);
})->with('Request methods');


test('can get random cafe', function () {
    $response = $this->get($this->endpoint);

    $response->assertStatus(Response::HTTP_OK);
});
