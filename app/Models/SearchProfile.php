<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchProfile extends Model
{
    use HasFactory;

    public function getSearchFieldsAttribute($search_fields)
    {
        return json_decode($search_fields, true);
    }
}
