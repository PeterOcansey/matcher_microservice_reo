<?php

namespace App\REO\Repos;

use App\Models\SearchProfile;


class SearchProfileRepo
{
    public function findSearchProfilesByPropertyType($property_type)
    {
        return SearchProfile::where('property_type', $property_type)->get();
    }
}