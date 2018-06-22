<?php

namespace Mandate\Http\Controllers;

use Mandate\HomeCellMembers;
use Illuminate\Http\Request;
use Mandate\Http\Requests\HomeCellJoinRequest;
use Illuminate\Support\Facades\Auth;


class HomeCellMembersController extends Controller
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
    public function store(HomeCellJoinRequest $request)
    {
        $member = new HomeCellMembers();
        $member->cell_id = $request->get('cell');
        $member->member_id = Auth::user()->id;

        $member->save();
        return \Redirect::to('homecell')->with('message', 'Your have successfully joined a Home Cell');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mandate\HomeCellMembers  $homeCellMembers
     * @return \Illuminate\Http\Response
     */
    public function show(HomeCellMembers $homeCellMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mandate\HomeCellMembers  $homeCellMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeCellMembers $homeCellMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mandate\HomeCellMembers  $homeCellMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeCellMembers $homeCellMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mandate\HomeCellMembers  $homeCellMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = HomeCellMembers::where('member_id', $id);
        $team->delete();

        return \Redirect::to('homecell')->with('message', 'You have been removed from the Home cell!');
    }
}
