<?php

namespace App\Http\Controllers;

use App\Main_group;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class GroupSearchController extends Controller {
    public function index() {
        $user = auth()->user();
        $groups_user_not_in = Member::rightJoin('main_groups', 'main_groups.id', '=', 'members.groupId')
            ->where('userId', '<>', $user->id)
            ->get();
        return view('searchpage')
            ->with('grouplist', $groups_user_not_in);
    }

    public function post() {
        if (Input::has('search')) {
            $search_string = Input::get('search');
            $result_group = Main_group::join('members', 'members.groupId', '=', 'main_groups.id')
                ->where('groupName', $search_string)
                ->get();
            return view('searchpage')
                ->with('grouplist', $result_group);
        }
        else {
            return $this->index();
        }
    }
}