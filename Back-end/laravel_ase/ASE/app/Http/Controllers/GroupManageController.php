<?php

namespace App\Http\Controllers;

use App\JoinRequest;
use App\Member;

class GroupManageController extends Controller {
    public function index($groupId) {

        // Get all members
        $Members = Member::where('groupId', $groupId)
            ->join('users', 'users.id', '=', 'members.userId')
            ->get();

        // Get all joining requests
        $joinRequests = JoinRequest::where('groupId', $groupId)
            ->get();

        return view('groupmanage')
            ->with('memberList', $Members)
            ->with('joinRequests', $joinRequests);
    }
}