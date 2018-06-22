<?php

namespace Mandate\Http\Controllers;

use Illuminate\Http\Request;
use Mandate\User;
use Mandate\Announcement;
use Mandate\NewConvert;
use Mandate\Testimony;
use Illuminate\Support\Facades\Auth;
use Mandate\Http\Requests\UpdateUserProfile;
use Mandate\Http\Requests\UpdateUserLocation;
use Mandate\Http\Requests\ChangeLoginCredential;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $test = DB::table('announcements')
            ->where('church_id', \Auth::user()->church_id)
            ->latest()
            ->paginate(15);

        $announcements = Announcement::orderBy('created_at', 'desc')
            ->where('church_id', \Auth::user()->church_id)
            ->take(5)->get();
        $announcement_count = Announcement::where('church_id', \Auth::user()->church_id)->count();

        $testimony = DB::table('testimonies')
            ->whereNotNull('approved')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->take(5)->get();

        $testimony_count = DB::table('testimonies')
            ->whereNotNull('approved')
            ->whereNull('deleted_at')
            ->count();

        $my_convert = NewConvert::where('soul_winner_id', Auth::user()->id)->count();
        $new_convert_count = NewConvert::count();
        return view('user.index')->with([
            'testimonies' => $testimony,
            'announcements' => $announcements,
            'announcement_count' => $announcement_count,
            'testimony_count' => $testimony_count,
            'my_convert' => $my_convert,
            'new_convert_count' => $new_convert_count,
        ]);
    }

    public function getLoginForm()
    {
        $user = User::where('users.id', Auth::user()->id)->first();

        return view('user.login')->with('user', $user);
    }

    public function getLocationForm()
    {
        $user = User::where('users.id', Auth::user()->id)
                            ->join('app_country', 'users.country_id','=','app_country.id')
                            ->join('app_state', 'users.state_id','=','app_state.id')
                            ->join('app_city', 'users.city_id','=','app_city.id')
                            ->join('churches', 'users.church_id','=', 'churches.id')
                            ->select('users.*', 'app_country.name as country', 'app_state.name as state', 'app_city.name as city','churches.church_name as church')
                            ->first();

        $countries = DB::table("app_country")->pluck("name","id")->toArray();


        return view('user.location')->with(['user' => $user, 'countries' => $countries]);
    }

    public function getUserProfile(){
        $user = User::where('users.id', Auth::user()->id)
            ->join('app_country', 'users.country_id','=','app_country.id')
            ->join('app_state', 'users.state_id','=','app_state.id')
            ->join('app_city', 'users.city_id','=','app_city.id')
            ->join('churches', 'users.church_id','=', 'churches.id')
            ->select('users.*', 'app_country.name as country', 'app_state.name as state', 'app_city.name as city','churches.church_name as church')
            ->first();
        return view('user.profile')->with('user', $user);
    }

    public function getProfile($id){
        $slug = User::findBySlug($id);

        $user = User::where('users.id', $slug->id)
            ->join('app_country', 'users.country_id','=','app_country.id')
            ->join('app_state', 'users.state_id','=','app_state.id')
            ->join('app_city', 'users.city_id','=','app_city.id')
            ->join('churches', 'users.church_id','=', 'churches.id')
            ->select('users.*', 'app_country.name as country', 'app_state.name as state', 'app_city.name as city','churches.church_name as church')
            ->first();
        return view('user.personProfile')->with('profile', $user);
    }

    public function updateProfile(UpdateUserProfile $request, $id)
    {
        $user = User::findOrFail($id);
        $user->firstname = $request->get('firstname');
        $user->surname = $request->get('surname');
        $user->othername = $request->get('othername');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->slug = $request->get('slug');

        $user->save();

        return \Redirect::to('home/profile')->with('message', 'Your Personal details has been updated');

    }

    public function updateUserLocation(UpdateUserLocation $request, $id)
    {
        $user = User::findOrFail($id);
        $user->church_id = $request->get('church');
        $user->country_id = $request->get('country');
        $user->state_id = $request->get('state');
        $user->city_id = $request->get('city');

        $user->save();

        return \Redirect::to('home/profile')->with('message', 'Your details has been updated');

    }

    public function updateUserLogin(ChangeLoginCredential $request, $id)
    {
        $user = User::findOrFail($id);
        if (Hash::check($request->get('old_password'), $user->password)) {
            $request->user()->fill([
                'password' => Hash::make($request->get('new_password'))
            ])->save();
            return redirect('home/profile')->withMessage('Password has been updated successfully');
        }else{
            return \Redirect::back()->withErrors('Old Password does not match with what we had');
        }
        
    }

    

    public function getUserTeam(){
        return view('user.team.show');
    }

    
}
