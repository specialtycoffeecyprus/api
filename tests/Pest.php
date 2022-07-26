<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class)->in(__DIR__);
//uses(TestCase::class)->in(__DIR__);

beforeEach(function (): void {
    //$this->createApplication();
    $this->refreshDatabase();
    //$this->withoutMiddleware();
});
