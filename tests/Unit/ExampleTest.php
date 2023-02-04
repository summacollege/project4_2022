<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_loads_correctly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackAndTraceTest extends TestCase
{
    use WithoutMiddleware;

    public function testTrackPageLoadsCorrectly()
    {
        $this->get('/tracktrace')
             ->assertStatus(200)
             ->assertSee('tracktrace');
    }

    public function testTraceWithInvalidTrackingNumber()
    {
        $response = $this->post('/tracktrace', [
            'tracking_number' => 'invalid'
        ]);

        $response->assertSessionHasErrors();
        $this->assertEquals(session()->get('errors')->first(), 'Invalid tracking number.');
    }

    public function testTraceWithValidTrackingNumber()
    {
        $response = $this->post('/tracktrace', [
            'tracking_number' => 'valid'
        ]);

        $response->assertSee('Delivery status: Delivered');
        $response->assertSee('Delivery date: 01/01/2022');
        $response->assertSee('Delivery location: 123 Main St, Anytown USA');
    }
}


