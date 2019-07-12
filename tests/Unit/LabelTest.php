<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LabelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStore()
    {
        $response = $this->post('/labels',
            [
                'Name' => 'Name',
                'Slug' => 'Slug',
                'Path' => 'Path',
                'TextColour' => 'yellow',
                'BGColour' => 'pink'
            ]);

        $response
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->put('/labels/1',
            [
                'Name' => 'Name1',
                'Slug' => 'Slug1',
                'Path' => 'Path1',
                'TextColour' => 'red',
                'BGColour' => 'blue'
            ]);

        $response
            ->assertStatus(200);
    }

    public function testDelete()
    {
        $response = $this->delete('/labels/1');

        $response->assertStatus(200);
    }
}
