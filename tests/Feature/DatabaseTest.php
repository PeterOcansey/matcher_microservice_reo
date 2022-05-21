<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;
use App\Models\SearchProfile;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a property can be created
     * Assert our database has the right record
     * 
     * @return void
     * 
     * @test
     */
    public function a_property_can_be_created()
    {
        $this->withoutExceptionHandling();

        $property = Property::factory()->create();

        $this->assertModelExists($property);
    }

    
    /**
     * Test a search profile can be created
     * Assert our database has the right record
     * 
     * @return void
     * 
     * @test
     */
    public function a_search_profile_can_be_created()
    {
        $this->withoutExceptionHandling();

        $search_profile = SearchProfile::factory()->create();

        $this->assertModelExists($search_profile);
    }
}
