<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\PPD;
use App\Models\User;

class PPDTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function getPDDS(): void
    {
        User::factory()->create();
        PPD::factory(5)->create();
        $response = $this->get('api/progress');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }
    public function testUpdatePPD()
    {
        $response = $this->json('PUT', '/api/progress', [
            'title' => 'allo',
            'weight' => '300',
            'size' => '2',
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'field_that_return' => true
            ]);
    }
}
