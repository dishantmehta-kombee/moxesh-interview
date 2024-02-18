<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        $stateId = $request->input('state_id');
        $cities = City::active()->where('state_id', $stateId)->get();
        return response()->json(['status' => 200, 'data' => $cities]);
    }
}
