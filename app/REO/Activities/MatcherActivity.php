<?php

namespace App\REO\Activities;


use Illuminate\Support\Facades\Log;
use App\REO\Repos\PropertyRepo;
use App\REO\Repos\SearchProfileRepo;
use App\REO\Api\ApiResponse;
use App\REO\Utils\Constants;
use App\REO\Traits\ComputeMatchesTrait;

class MatcherActivity 
{
    use ComputeMatchesTrait;

    protected $propertyRepo;
    protected $searchProfileRepo;
    protected $apiResponse;

    public function __construct(PropertyRepo $propertyRepo, SearchProfileRepo $searchProfileRepo, ApiResponse $apiResponse)
    {
        $this->propertyRepo = $propertyRepo;
        $this->searchProfileRepo = $searchProfileRepo;
        $this->apiResponse = $apiResponse;
    }

    /**
     * List Property Search Profile Matches
     * 
     * Query DB for search profiles based on property fields
     * Compute loose and strict matches
     * 
     * @params Property $id
     * 
     * @return json response
     * 
     */
    public function getSearchProfileMatches($id)
    {
        // Fetch Property by $id
        // Return not found error response, if property is null
        $property = $this->propertyRepo->findPropertyById($id);
        if(!$property)
        {
            return $this->apiResponse->notFoundError("Property not found");
        }

        // Fetch Search Profiles based on the property type
         $search_profiles = $this->searchProfileRepo->findSearchProfilesByPropertyType( $property->property_type);
         if(!$search_profiles || count($search_profiles) <= 0)
         {
             // Return not found erorr response, if no search profile record found
            return $this->apiResponse->notFoundError("Search profiles not found");
         }


         $response_data = [];
         foreach($search_profiles as $search_profile)
         {
            // Step through each search fields and compute strict or loose match
            $strict_count = 0;
            $loose_count = 0;
            foreach($search_profile->search_fields as $key => $search_profile_val)
            {
                if(isset($property->fields[$key]))
                {
                    // The search profile have same property key, compute strictMatch
                    if( $this->strictMatch( $property->fields[$key], $search_profile_val ) ) 
                    {
                        $strict_count++;
                        continue;
                    }

                    // We're here because there is no strictMatch for this key, compute looseMatch
                    if( $this->looseMatch( $property->fields[$key], $search_profile_val ) )
                    {
                        $loose_count++;
                    }
                }
            }

            // Record the compute matches for the search profile, score should be the total strict_count + total loose count
            if($strict_count > 0 || $loose_count > 0)
            {
                array_push($response_data, [
                    'searchProfileId' => $search_profile->id,
                    'score' => ($strict_count + $loose_count), 
                    'strictMatchesCount' => $strict_count, 
                    'looseMatchesCount' => $loose_count,
                ]);
            }
         }

         if( count( $response_data ) > 0 ) // Ensure we have some data to sort before 
         {
             // Make use of laravel's built in collection api and sort score values in descending order
             $response_data = collect($response_data)->sortBy([ ['score', 'desc'] ])->values();
         }

         return $this->apiResponse->success("Property serch profile macthed successfully", ["data" => $response_data]);
    }

}