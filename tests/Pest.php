<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class)->beforeEach(function (): void {
    $this->refreshDatabase();
    $this->withoutMiddleware(ThrottleRequests::class);
})->in(__DIR__);
