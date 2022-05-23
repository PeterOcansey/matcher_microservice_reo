<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\REO\Activities\MatcherActivity;
use App\REO\Api\ApiResponse;

class PropertyMatchingController extends Controller
{
    protected $matcherActivity;
    protected $apiResponse;

    public function __construct(MatcherActivity $matcherActivity, ApiResponse $apiResponse)
    {
        $this->matcherActivity = $matcherActivity;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get property match with search profiles
     * 
     * @params Request $request, Property $id
     * 
     * @return json response
     */
    public function getSearchProfileMatches(Request $request, $id)
    {
        try{
            return $this->matcherActivity->getSearchProfileMatches($id);
        }catch(\Exception $e){
            Log::info($e);
            return $this->apiResponse->serverError();
        }
    }
}
