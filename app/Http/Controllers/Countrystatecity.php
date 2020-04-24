<?php

namespace App\Http\Controllers;

use App\City;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Countrystatecity extends Controller
{
    public function states()
    {
        $country_id = Input::get('country_id');

        $states = State::where('country_id', '=', $country_id)->get();

        return response()->json($states);

        
    }

    public function cities(){


        $state_id = Input::get('state_id');

        $cities = City::where('state_id', '=', $state_id)->get();

        return response()->json($cities);
    }
}
