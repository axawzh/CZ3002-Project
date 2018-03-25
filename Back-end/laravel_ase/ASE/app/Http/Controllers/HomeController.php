<?php

namespace App\Http\Controllers;

use App\Group;
use App\Main_group;
use App\User;
use App\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $groups = auth()->user()->groups->where('id', $id)->first();

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();
        $cruds = Announcement::where('groupId',$id)->get();

        return view('grouppage', ['groups' => $groups, 'users' => $users, 'user' => $user,'cruds'=>$cruds,'id' => $id ]);
    }

    public function homeView() {
        $userId = auth()->user()->id;
        $academicGroups = Main_group::join('members', 'members.groupId', '=', 'main_groups.id')
            ->join('academic_group', 'academic_group.groupId', '=', 'main_groups.id')
            ->where('members.userId', $userId)
            ->get();
        $nonAcademicGroups = Main_group::join('members', 'members.groupId', '=', 'main_groups.id')
            ->join('non_academic_group', 'non_academic_group.groupId', '=', 'main_groups.id')
            ->where('members.userId', $userId)
            ->get();
        return view("userhome")
            ->with('academicGroups', $academicGroups)
            ->with('nonAcademicGroups', $nonAcademicGroups);
    }
}
