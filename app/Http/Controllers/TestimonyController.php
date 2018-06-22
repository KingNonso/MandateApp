<?php

namespace Mandate\Http\Controllers;

use Mandate\Testimony;
use Illuminate\Http\Request;
use Mandate\Http\Requests\CreateNewTestimony;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if($this->is_admin()){
            $test = Testimony::where('testimonies.church_id',\Auth::user()->church_id)
                ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
                ->join('users', 'testimonies.user_id', '=', 'users.id')
                ->select('testimonies.*', 'testimonies_category.name as category', 'users.firstname as person')
                ->latest()
                ->paginate(15);
            return view('admin.testimony.index', ['testimonies' => $test]);
        }

        $test = DB::table('testimonies')
            ->whereNotNull('approved')
            ->whereNull('deleted_at')
            ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
                ->join('users', 'testimonies.user_id', '=', 'users.id')
                ->select('testimonies.*', 'testimonies_category.name as category', 'users.firstname as person')
                ->latest()
                ->paginate(15);

        return view('testimony.index', ['testimonies' => $test]);

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
        $category = DB::table("testimonies_category")->pluck("name","id")->toArray();
        if($this->is_admin()){
            return view('admin.testimony.create',compact('category', $category));
        }
            return view('testimony.create',compact('category', $category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewTestimony $request)
    {
        $new = new Testimony();
        $new->subject = $request->subject;
        $new->category_id = $request->category;
        $new->happen_to = $request->happen_to;
        $new->contact = $request->contact;
        $new->testimony = $request->testimony;
        $new->user_id = \Auth::user()->id;
        $new->church_id = \Auth::user()->church_id;

        $new->save();

        return redirect()->back()->withMessage('Testimony has been submitted successfully and would be subject to final review');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Mandate\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show($testimony)
    {
        $slug = Testimony::findBySlug($testimony);

        if($this->is_admin()){
            $details = Testimony::where('testimonies.id', $slug->id)
                ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
                ->join('users', 'testimonies.user_id', '=', 'users.id')
                ->join('churches', 'users.church_id', '=', 'churches.id')
                ->select('testimonies.*', 'testimonies_category.name as category', 'users.firstname as person','churches.church_name as church')
                ->first();

            return view('admin.testimony.show')->with('details', $details);
        }else{
            DB::table('testimony_viewers')->insert([
                'testimony_id' => $slug->id,
                'user_id' => \Auth::user()->id
            ]);
            $details = Testimony::where('testimonies.id', $slug->id)
                ->where('approved','!=','')
                ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
                ->join('users', 'testimonies.user_id', '=', 'users.id')
                ->join('churches', 'users.church_id', '=', 'churches.id')
                ->select('testimonies.*', 'testimonies_category.name as category', 'users.firstname as person','churches.church_name as church')
                ->first();

        }


        return view('testimony.show')->with('details', $details);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mandate\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($testimony)
    {
        $slug = Testimony::findBySlug($testimony);
        $details = Testimony::where('testimonies.id', $slug->id)
            ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
            ->select('testimonies.*', 'testimonies_category.name as category')
            ->first();

        $category = DB::table("testimonies_category")->pluck("name","id")->toArray();
        if($this->is_admin()){
            return view('admin.testimony.edit',compact('category', $category))->with('data', $slug);
        }
        return view('testimony.edit',compact('category', $category))->with('data', $slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mandate\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewTestimony $request, $testimony)
    {
        $new = Testimony::findOrFail($testimony);
        $new->subject = $request->subject;
        $new->category_id = $request->category;
        $new->happen_to = $request->happen_to;
        $new->contact = $request->contact;
        $new->testimony = $request->testimony;

        $new->save();

        return \Redirect::back()->withMessage('Updated Successfully.');
    }

    public function approve($testimony)
    {
        $new = Testimony::findOrFail($testimony);
        $new->approved = Carbon::now();
        $new->approved_by = \Auth::user()->id;

        $new->save();

        return \Redirect::back()->withMessage('Testimony has been approved Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mandate\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($testimony)
    {
        $team = Testimony::where('id', $testimony);
        $team->delete();

        return \Redirect::back()->with('message', 'Testimony has been deleted successfully!');
    }

    public function getMyTestimony(){
        $test = DB::table('testimonies')
            ->where('testimonies.user_id', \Auth::user()->id)
            ->join('testimonies_category', 'testimonies.category_id', '=','testimonies_category.id')
            ->join('users', 'testimonies.user_id', '=', 'users.id')
            ->select('testimonies.*', 'testimonies_category.name as category', 'users.firstname as person')
            ->latest()
            ->paginate(10);

        return view('testimony.index', ['testimonies' => $test]);

    }
}
