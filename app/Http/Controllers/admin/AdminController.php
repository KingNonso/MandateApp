<?php

namespace Mandate\Http\Controllers\admin;

use Mandate\Http\Controllers\Controller;
use Mandate\User;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
       // return view('admin.dashboard')->withInfo('Info alert preview. This alert is error two');
    }
}
