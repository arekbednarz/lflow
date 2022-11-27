<?php

namespace Tests\Feature;

use Tests\ApiTestTrait;
use Tests\TestCase;

abstract class ApiTestCase extends TestCase
{
    use ApiTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fakeHttp();
    }
}
