<?php

namespace Mandate\Http\Controllers;

use Mandate\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mandate\Http\Requests\CreateNewAnnouncement;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if($this->is_admin()){
            $test = Announcement::where('church_id', \Auth::user()->church_id)
                ->latest()
                ->paginate(15);
            return view('admin.announcement.index', ['announcements' => $test]);
        }else{
            $test = Announcement::where('church_id', \Auth::user()->church_id)
                ->where('approved','!=', '')
                ->latest()
                ->paginate(15);
            return view('announcement.index', ['announcements' => $test]);

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
        if($this->is_admin()){
            return view('admin.announcement.create');
        }
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewAnnouncement $request)
    {
        $new = new Announcement();
        $new->subject = $request->subject;
        $new->body = $request->body;
        $new->user_id = \Auth::user()->id;
        $new->church_id = \Auth::user()->church_id;

        $new->save();

        return redirect()->back()->withMessage('Announcement has been submitted successfully and would be subject to final review');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mandate\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($announcement)
    {
        $slug = Announcement::findBySlug($announcement);

        DB::table('announcement_viewers')->insert([
            'announcement_id' => $slug->id,
            'user_id' => \Auth::user()->id
        ]);

        $details = Announcement::where('announcements.id', $slug->id)

            ->first();


        if($this->is_admin()){
            return view('admin.announcement.show')->with('details', $details);
        }
        return view('announcement.show')->with('details', $details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mandate\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($announcement)
    {
        $slug = Announcement::findBySlug($announcement);
        $details = Announcement::where('announcements.id', $slug->id)
                        ->first();

        if($this->is_admin()){
            return view('admin.announcement.edit')->with('data', $details);
        }
        return view('announcement.edit')->with('data', $slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mandate\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewAnnouncement $request, $announcement)
    {
        $new = Announcement::findOrFail($announcement);
        $new->subject = $request->subject;
        $new->body = $request->body;

        $new->save();

        return \Redirect::back()->withMessage('Updated Successfully.');
    }

    public function approve($announcement)
    {
        $new = Announcement::findOrFail($announcement);
        $new->approved = Carbon::now();
        $new->approved_by = \Auth::user()->id;

        $new->save();

        return \Redirect::back()->withMessage('Announcement has been approved Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mandate\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($announcement)
    {
        $team = Announcement::where('id', $announcement);
        $team->delete();

        return \Redirect::back()->with('message', 'Announcement has been deleted successfully!');
    }

    public function getMyAnnouncement(){
        $test = DB::table('announcements')
            ->where('announcements.user_id', \Auth::user()->id)

            ->join('users', 'announcements.user_id', '=', 'users.id')
            ->select('announcements.*', 'users.firstname as person')
            ->latest()
            ->paginate(10);

        return view('announcement.index', ['announcements' => $test]);

    }

}
