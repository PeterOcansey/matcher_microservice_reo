<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class HttpTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test matching property and search profiles endpoint
     * Assert our endpoint is ok
     * Assert our endpoint returns a valid json strucutre
     *  
     * @test 
     * */
    public function a_property_can_be_matched_to_search_profiles()
    {
        $this->withoutExceptionHandling();

        $property = Property::factory()->create();

        $response = $this->get("/api/match/{$property->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure(['code','message']);
    }
}
