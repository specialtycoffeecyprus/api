<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class)->beforeEach(function (): void {
    $this->withoutMiddleware(ThrottleRequests::class);
})->in(__DIR__);
