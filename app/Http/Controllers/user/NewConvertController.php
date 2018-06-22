<?php

namespace Mandate\Http\Controllers\user;

use Illuminate\Http\Request;
use Mandate\Http\Controllers\Controller;
use Mandate\Http\Requests\CreateNewConvert;
use Illuminate\Support\Facades\Auth;
use Mandate\NewConvert;
use Mandate\TeamMembers;
use Mandate\Team;
use Mandate\NewConvertAction;

class NewConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = TeamMembers::where('member_id',Auth::user()->id)
                ->join('teams', 'team_members.team_id', '=','teams.id')
                ->first();
        if(!$team){
            return \Redirect::to('team')->withErrors('You seem not to be in any team, please join or create one to proceed');
        }
        $convert = NewConvert::where('team_id', $team->team_id)
                                ->join('users', 'new_converts.soul_winner_id','=','users.id')
                                ->select('new_converts.*', 'users.firstname as winner')
                                ->get();

        return view('user.newconvert.index')->with(['members' => $convert, 'team' => $team]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.newconvert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewConvert $request)
    {
        $convert = new NewConvert();
        $convert->firstname = $request->get('firstname');
        $convert->surname = $request->get('surname');
        $convert->sex = $request->get('sex');
        $convert->phone = $request->get('phone');
        $convert->email = $request->get('email');
        $convert->address = $request->get('address');

        $convert->age = $request->get('age');
        $convert->occupation = $request->get('occupation');
        $convert->request = $request->get('request');

        $convert->soul_winner_id = Auth::user()->id;
        $convert->church_id = Auth::user()->church_id;
        $convert->team_id = TeamMembers::where('member_id',Auth::user()->id)->first()->team_id;

        $convert->save();

        return \Redirect::to('newconvert/create')->with('message', 'New Convert details has been saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convert = NewConvert::findBySlug($id);
        $actions = NewConvertAction::where('new_convert_id', $convert->id)
                                    ->join('users', 'new_convert_actions.actor_id','=','users.id')
                                    ->select('new_convert_actions.*', 'users.firstname as winner')
                                    ->get();

        return view('user.newconvert.profile')->with(['convert' => $convert, 'actions' => $actions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
