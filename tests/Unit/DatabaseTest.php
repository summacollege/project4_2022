<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_connected_correctly()
    {
        try {
            \DB::connection()->getPdo();
        } catch (\Exception $e) {
            $this->assertTrue(false, "Could not connect to the database.  Check your configuration.");
        }

        $this->assertTrue(true, 'Connected to the database.');
    }
}

