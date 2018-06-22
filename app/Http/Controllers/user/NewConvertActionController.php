<?php

namespace Mandate\Http\Controllers\user;

use Mandate\NewConvertAction;
use Illuminate\Http\Request;
use Mandate\Http\Requests\CreateNewConvertAction;
use Mandate\TeamMembers;
use Mandate\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class NewConvertActionController extends Controller
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
    public function store(CreateNewConvertAction $request)
    {
        $action = new NewConvertAction();
        $action->new_convert_id = $request->get('new_convert_id');
        $action->actor_id = \Auth::user()->id;
        $action->team_id = TeamMembers::where('member_id',Auth::user()->id)->first()->team_id;
        $action->feedback = $request->get('feedback');
        $action->action = $request->get('action');

        $action->save();

        return \Redirect::back()->withMessage('Action has been saved successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mandate\NewConvertAction  $newConvertAction
     * @return \Illuminate\Http\Response
     */
    public function show(NewConvertAction $newConvertAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mandate\NewConvertAction  $newConvertAction
     * @return \Illuminate\Http\Response
     */
    public function edit(NewConvertAction $newConvertAction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mandate\NewConvertAction  $newConvertAction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewConvertAction $newConvertAction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mandate\NewConvertAction  $newConvertAction
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewConvertAction $newConvertAction)
    {
        //
    }
}
