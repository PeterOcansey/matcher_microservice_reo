<?php

namespace App\REO\Utils;

class Constants
{
	const DEFAULT_PROPERTY_FIELDS = ['area', 'yearOfConstruction', 'rooms', 'heatingType', 'parking', 'returnActual', 'price'];
    const DEFAULT_PROFILE_SEARCH_FIELDS = ['area', 'yearOfConstruction', 'rooms', 'heatingType', 'parking', 'returnActual', 'price','returnPotential'];
    const DEFAULT_HEATING_TYPES = ['Gas', 'Geothermal', 'Electric', 'Radiant', 'Steam Radiant'];
    const DEFAULT_PARKINGS = [true, false];
    const DEFAULT_LOOSE_PERCENTAGE = 0.25;
}