<?php

declare(strict_types=1);

use Spectator\Spectator;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function (): void {
    $this->endpoint = route('cafes.nearest');
});

test('can process request method', function (int $latitude, int $longitude, string $method, int $status): void {
    $this->$method($this->endpoint."?latitude=$latitude&longitude=$longitude")->assertStatus($status);
})->with('Search locations')->with('Request methods');

test('fail if location query is invalid', function (string $latitudeQuery, string $latitudeError, string $longitudeQuery, string $longitudeError): void {
    $this->get($this->endpoint.'?'.$latitudeQuery.'&'.$longitudeQuery)->assertInvalid(['latitude' => $latitudeError, 'longitude' => $longitudeError]);
})->with([
    'latitude absent' => ['latitudeQuery' => '', 'latitudeError' => 'The latitude field is required.'],
    'latitude empty' => ['latitudeQuery' => 'latitude=', 'latitudeError' => 'The latitude field is required.'],
    'latitude is not a number' => ['latitudeQuery' => 'latitude=a', 'latitudeError' => 'The latitude field must be a number.'],
    'latitude too small' => ['latitudeQuery' => 'latitude='.random_int(-200, -91), 'latitudeError' => 'The latitude field must be between -90 and 90.'],
    'latitude too big' => ['latitudeQuery' => 'latitude='.random_int(91, 200), 'latitudeError' => 'The latitude field must be between -90 and 90.'],
])->with([
    'longitude absent' => ['longitudeQuery' => '', 'longitudeError' => 'The longitude field is required.'],
    'longitude empty' => ['longitudeQuery' => 'longitude=', 'longitudeError' => 'The longitude field is required.'],
    'longitude is not a number' => ['longitudeQuery' => 'longitude=a', 'longitudeError' => 'The longitude field must be a number.'],
    'longitude too small' => ['longitudeQuery' => 'longitude='.random_int(-200, -181), 'longitudeError' => 'The longitude field must be between -180 and 180.'],
    'longitude too big' => ['longitudeQuery' => 'longitude='.random_int(181, 200), 'longitudeError' => 'The longitude field must be between -180 and 180.'],
]);

test('can lookup nearest cafe', function (int $latitude, int $longitude): void {
    Spectator::using($this->apiSchema);

    $this->getJson($this->endpoint."?latitude=$latitude&longitude=$longitude")->assertValidRequest()->assertValidResponse(Response::HTTP_OK);
})->with('Search locations');
