<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\SearchProfile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Add 5 properties with 2 associated search profile records each
        Property::factory()->count(5)->create()->each(function($property){
                    SearchProfile::factory()->count(2)->create([
                            'property_type' => $property->property_type,
                    ]);
                });
        
        //Add 3 properties without associated search profile records
        Property::factory()->count(3)->create();

        //Add 5 search profiles without associated property records
        SearchProfile::factory()->count(5)->create();
    }
}
