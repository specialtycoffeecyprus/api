<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->endpoint = route('cafes.index');
});


test('can process request method', function (string $method, int $status) {
    $this->$method($this->endpoint)->assertStatus($status);
})->with('Request methods');


test('can list cafes', function () {
    $this->get($this->endpoint)->assertStatus(Response::HTTP_OK);
});
