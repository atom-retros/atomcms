<?php

namespace Tests;

use Database\Seeders\TestingSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected string $seeder = TestingSeeder::class;
}
