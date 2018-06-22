<?php

namespace Mandate\Http\Controllers\user;

use Illuminate\Http\Request;
use Mandate\TeamMembers;
use Mandate\User;
use Mandate\Http\Requests\TeamMemberJoinRequest;
use Illuminate\Support\Facades\Auth;
use Mandate\Http\Controllers\Controller;


class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamMemberJoinRequest $request)
    {
        $member = new TeamMembers();
        $member->team_id = $request->get('team');
        $member->member_id = Auth::user()->id;

        $member->save();
        return \Redirect::to('team')->with('message', 'Your have successfully joined a Team');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $team = TeamMembers::where('member_id', $id);
        $team->delete();

        return \Redirect::to('team')->with('message', 'You have been removed from the team!');
    }
}
