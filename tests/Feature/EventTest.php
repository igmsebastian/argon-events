<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    /**
     * Validate access to get the latest event.
     *
     * @return void
     */
    public function testGetLatestEvent()
    {
        $response = $this->get(config('app.url')."/api/events/latest");

        $response->assertStatus(200);
    }

    /**
     * Validate if new event can be created.
     *
     * @return void
     */
    public function testCreateNewEvent()
    {
        $data = [
            'name' => 'Test Event',
            'started_at' => '11/01/2020',
            'ended_at' => '11/27/2020',
            'days' => [
                'wednesday',
                'monday'
            ]
        ];

        $response = $this->json('POST', config('app.url')."/api/events", $data);

        $response->assertStatus(201);
    }
}
