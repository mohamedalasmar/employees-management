<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    //
    public function getCountries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }

    public function getStates(Country $country){

        return response()->json($country->states);

    }

    public function getCities(State $state){

        return response()->json($state->cities);
        
    }
}
