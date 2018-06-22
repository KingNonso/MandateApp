<?php

namespace Mandate\Http\Controllers\user;

use Illuminate\Http\Request;
use Mandate\Http\Controllers\Controller;
use Mandate\Http\Requests\TeamFormRequest;
use Mandate\Team;
use Mandate\TeamMembers;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = TeamMembers::where('member_id', Auth::user()->id)->join('teams', 'teams.id', '=','team_members.team_id')->first();
        if($team){ //get list of team members
            $members = TeamMembers::where('team_id', $team->id)->join('users', 'users.id','=','team_members.member_id')->get();

            return view('user.team.show')->with(['team' => $team,'members' => $members]);

        }else{ // get all teams one can join
            $teams = Team::where('teams.church_id', Auth::user()->church_id)
                            ->join('users','teams.creator_id','=', 'users.id')
                            ->select('users.*', 'teams.*', 'users.id as user_id','teams.id as team_id')
                            ->get();

                            //dd($teams);
            if(count($teams) < 1){ $teams = null; }
            return view('user.team.show')->with(['team' => null,'teams' => $teams]);

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamFormRequest $request)
    {
        $team = new Team;
        $team->name = $request->get('name');
        $team->description = $request->get('description');
        $team->church_id = Auth::user()->church_id;
        $team->creator_id = Auth::user()->id;

        $team->save();

        $last = $team->id;

        $member = new TeamMembers();
        $member->team_id = $last;
        $member->member_id = Auth::user()->id;

        $member->save();

        return \Redirect::to('team')->with('message', 'Your Team has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);

        return view('user.team.edit')->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamFormRequest $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->get('name');
        $team->description = $request->get('description');

        $team->save();

        return \Redirect::to('team.edit',[$team->id])->with('message', 'Your Team details has been updated');
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
