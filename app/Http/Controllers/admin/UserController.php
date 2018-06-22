<?php

namespace Mandate\Http\Controllers\admin;

use Illuminate\Http\Request;
use Mandate\Http\Controllers\Controller;
use Mandate\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('church_id',\Auth::user()->church_id)
            ->latest()
            ->paginate(3);

        return view('admin.user.index', ['testimonies' => $users]);
    }

    public function getHomeCellExco()
    {
        $users = DB::table('homecells')
            ->where('homecells.church_id',\Auth::user()->church_id)
            ->join('users', 'users.id', '=', 'homecells.creator_id')
            ->paginate(3);

        return view('admin.user.index', ['testimonies' => $users]);
    }

    public function getTeamLeaders()
    {
        $users = DB::table('teams')
            ->where('teams.church_id',\Auth::user()->church_id)
            ->join('users', 'users.id', '=', 'teams.creator_id')
            ->paginate(3);

        return view('admin.user.index', ['testimonies' => $users]);
    }

    public function getNewConverts()
    {
        $users = DB::table('new_converts')
            ->where('new_converts.church_id',\Auth::user()->church_id)
            ->join('users', 'users.id', '=', 'new_converts.soul_winner_id')
            ->paginate(3);

        return view('admin.user.index', ['testimonies' => $users]);
    }

    public function getChurchAdmin()
    {
        $users = User::where('church_id',\Auth::user()->church_id)
            ->where('permission_id',1)
            ->paginate(3);

        return view('admin.user.index', ['testimonies' => $users]);
    }



}
