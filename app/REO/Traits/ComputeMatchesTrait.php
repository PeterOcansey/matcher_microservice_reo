<?php 

namespace App\REO\Traits;

use App\REO\Utils\Constants;
use Illuminate\Support\Facades\Log;

trait ComputeMatchesTrait 
{

    public function strictMatch($propertyValue, $searchProfileValue)
    {
        if(is_array($searchProfileValue)){
            return in_array($propertyValue, $searchProfileValue); // Range strict matching
        }

        return ($propertyValue === $searchProfileValue); // Direct strict matching
    }


    public function looseMatch($propertyValue, $searchProfileValues)
    {

        if( is_numeric( $propertyValue) && is_array( $searchProfileValues ) )
        {
            if( is_null( $searchProfileValues[0] ) && is_null( $searchProfileValues[1] ) ) // Return false when both min and max are null
            {
                return false;
            }

            $min = (int) $searchProfileValues[0];
            $max = (int) $searchProfileValues[1];

            // Disperse the $min and $max values, ($min - (0.25 * $min), ($max + (0.25 * $max)). Check if the $propertyValue is within $min and $max range
            if( $propertyValue >= ( $min - (Constants::DEFAULT_LOOSE_PERCENTAGE * $min) ) && $propertyValue <= ($max + (Constants::DEFAULT_LOOSE_PERCENTAGE * $max)) )
            {
                // Property value is within the range, we have a loose match
                return true; 
            }
        }

        // We do not have a match as $propertyValue may not be numeric, $searchProfileValues may not be an array or $propertyValue is not in the range of $searchProfileValues
        return false;
    }

}