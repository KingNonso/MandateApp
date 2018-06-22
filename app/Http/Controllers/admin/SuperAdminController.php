<?php

namespace Mandate\Http\Controllers\admin;

use Illuminate\Http\Request;
use Mandate\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $countries = DB::table("app_country")->pluck("name","id")->toArray();
        return view('super-admin.dashboard',compact('countries', $countries));
    }
}
