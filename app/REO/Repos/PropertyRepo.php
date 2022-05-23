<?php

namespace App\REO\Repos;

use App\Models\Property;


class PropertyRepo
{
    public function findPropertyById($id)
    {
        return Property::find($id);
    }
}