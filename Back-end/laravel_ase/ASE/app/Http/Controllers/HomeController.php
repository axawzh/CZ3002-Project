<?php

namespace App\Http\Controllers;

use App\Group;
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
    public function index()
    {
        $groups = auth()->user()->groups->where('name', 'test 1');

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();
   $cruds = Announcement::all()->toArray();


        return view('grouppage', ['groups' => $groups, 'users' => $users, 'user' => $user,'cruds'=>$cruds]);
    }

    public function homeView() {
        $userId = auth()->user()->id;
        $academicGroups = Group::join('group_user', 'group_user.groupId', '=', 'group.id')
            ->join('academic_group', 'academic_group.groupId', '=', 'group.id')
            ->where('group_user.userId', $userId)
            ->get();
        $nonAcademicGroups = Group::join('group_user', 'group_user.groupId', '=', 'group.id')
            ->join('non_academic_group', 'non_academic_group.groupId', '=', 'group.id')
            ->where('group_user.userId', $userId)
            ->get();
        return view("/home")
            ->with('academicGroups', $academicGroups)
            ->with('nonAcademicGroups', $nonAcademicGroups);
    }
}
