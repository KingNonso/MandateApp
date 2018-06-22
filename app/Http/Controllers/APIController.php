<?php

namespace Mandate\Http\Controllers;

use Mandate\Http\Requests;
use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    public function index()
    {
        $countries = DB::table("app_country")->pluck("name","id")->toArray();
        return view('welcome',compact('countries', $countries));
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("app_state")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id")->toArray();
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("app_city")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id")->toArray();
        return response()->json($cities);
    }
}
