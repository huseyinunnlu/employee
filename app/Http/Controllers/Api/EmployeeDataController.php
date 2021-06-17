<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Department;

class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }
    public function states($country_id)
    {
        $states = State::where('country_id',$country_id)->get();
        return response()->json($states);
    }
    public function cities($state_id)
    {
        $cities = City::where('state_id',$state_id)->get();
        return response()->json($cities);
    }
    public function departments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }

}
