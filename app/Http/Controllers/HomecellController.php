<?php

namespace Mandate\Http\Controllers;

use Mandate\Homecell;
use Mandate\HomeCellMembers;
use Mandate\Http\Requests\HomeCellFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomecellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->is_admin()){
            $homecells = Homecell::where('homecells.church_id', Auth::user()->church_id)
                ->join('users','homecells.creator_id','=', 'users.id')
                ->select('users.*', 'homecells.*', 'users.id as user_id','homecells.id as cell_id')
                ->get();

            return view('admin.homecell.show')->with(['homecell' => null,'homecells' => $homecells]);


        }
        $homecell = HomeCellMembers::where('member_id', Auth::user()->id)
            ->join('homecells', 'homecells.id', '=','home_cell_members.cell_id')->first();

        if($homecell){ //get list of team members
            $members = HomeCellMembers::where('cell_id', $homecell->id)->join('users', 'users.id','=','home_cell_members.member_id')->get();

            return view('homecell.show')->with(['homecell' => $homecell,'members' => $members]);

        }else{ // get all homecells one can join
            $homecells = Homecell::where('homecells.church_id', Auth::user()->church_id)
                ->join('users','homecells.creator_id','=', 'users.id')
                ->select('users.*', 'homecells.*', 'users.id as user_id','homecells.id as cell_id')
                ->get();


            if(count($homecells) < 1){ $homecells = null; }
            return view('homecell.show')->with(['homecell' => null,'homecells' => $homecells]);

        }
    }

    function is_admin(){
        if(\Auth::check()){
            if(\Auth::user()->permission_id == 1){
                return true;
            }
        }
        return false;
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
    public function store(HomeCellFormRequest $request)
    {
        $team = new Homecell;
        $team->name = $request->get('name');
        $team->address = $request->get('address');
        $team->church_id = Auth::user()->church_id;
        $team->creator_id = Auth::user()->id;

        $team->save();

        $last = $team->id;

        $member = new HomeCellMembers();
        $member->cell_id = $last;
        $member->member_id = Auth::user()->id;

        $member->save();

        return \Redirect::to('homecell')->with('message', 'Your Request for a Home cell has been sent successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Mandate\Homecell  $homecell
     * @return \Illuminate\Http\Response
     */
    public function show(Homecell $homecell)
    {
        $members = HomeCellMembers::where('cell_id', $homecell->id)->join('users', 'users.id','=','home_cell_members.member_id')->get();

        return view('admin.homecell.show')->with(['homecell' => $homecell,'members' => $members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mandate\Homecell  $homecell
     * @return \Illuminate\Http\Response
     */
    public function edit($homecell)
    {
        $team = Homecell::find($homecell);

        return view('homecell.edit')->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mandate\Homecell  $homecell
     * @return \Illuminate\Http\Response
     */
    public function update(HomeCellFormRequest $request, $homecell)
    {
        $team = Homecell::findOrFail($homecell);
        $team->name = $request->get('name');
        $team->address = $request->get('address');

        $team->save();

        return \Redirect::to('homecell.edit',[$team->id])->with('message', 'Your Home Cell details has been updated');
    }

    public function approve($announcement)
    {
        $new = Homecell::findOrFail($announcement);
        $new->approved = Carbon::now();
        $new->approved_by = \Auth::user()->id;

        $new->save();

        return \Redirect::back()->withMessage('Home cell has been approved Successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mandate\Homecell  $homecell
     * @return \Illuminate\Http\Response
     */
    public function destroy($homecell)
    {
        $team = Homecell::where('id', $homecell);
        $team->delete();

        return \Redirect::back()->with('message', 'Home cell has been closed down successfully!');
    }
}
