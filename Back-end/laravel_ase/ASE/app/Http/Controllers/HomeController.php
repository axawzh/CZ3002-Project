<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homeView() {
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
