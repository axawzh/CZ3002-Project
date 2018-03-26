<?php

namespace App\Http\Controllers;

use App\GroupUser;
use App\JoinRequest;
use App\Main_group;
use App\Member;
use Illuminate\Http\Request;
use App\Group;

class GroupJoinController extends Controller
{
    public function join($groupId) {
        $isFreeJoin = Main_group::where('id', $groupId) -> first() -> pluck('isFreeJoin');
        $user = auth()->user();

        $already_joined = Member::where([
            ['userId', '=', $user->id],
            ['groupId', '=', $groupId]
        ]);

        // User is already in the group!!!
        if($already_joined->first()) {
            $reasonStirng = 'You have already joined the group before!';
            return view('joinfailed')->with('reason', $reasonStirng);
        }

        // Check if the group full already
        $groupLimit = Main_group::where('id', $groupId) -> first() -> value('groupSize');
        $memberNumber = Member::where('groupId', $groupId)->count();
        if ($memberNumber >= $groupLimit) {
            $reasonStirng = 'Group is full!';
            return view('joinfailed')->with('reason', $reasonStirng);
        }

        // Free join
        if ($isFreeJoin == true) {
            // Join directly
            $cruds = new Member([
                'userId' => $user->id,
                'groupId' => $groupId
            ]);
            $cruds->save();

            $cruds = new GroupUser([
                'user_id' => $user->id,
                'group_id' => $groupId
            ]);
            $cruds->save();

            return view('joinsuccess', ['groupId' => $groupId]);
        }
        // Need permission
        else {
            // check if user has previously raised the joining request
            $join_request = JoinRequest::where([
                ['userId', '=', $user->id],
                ['groupId', '=', $groupId],
                ['isResolved', '=', 0]
            ]) -> first();

            // If user wants to join the group for the first time
            if (isNull($join_request)) {
                $new_join_request = new JoinRequest([
                    'userId' => $user->id,
                    'groupId' => $groupId,
                    'isResolved' => 0
                ]);
                $new_join_request->save();
                return view('joinsuccess', ['groupId' => $groupId]);
            }
            // If user has already raised the joining request but leader has not approved it
            else {
                return view('joinpending');
            }
        }
    }

    public function approve($isApproved) {
        $groupId = session()->get('groupId');

        if(request()->has('uid')) {
            $userId = request()->get('uid');
        }
        else{
            return 'Bad url parameter, please pass requester\'s userId as url parameter \'uid=\'';
        }

        if ($isApproved) {
            // Add into group
            $cruds = new Member([
                'userId' => $userId,
                'groupId' => $groupId
            ]);
            $cruds->save();

            // find the record
            $join_request = JoinRequest::where(
                ['userId', '=', $userId],
                ['groupId', '=', $groupId],
                ['isResolved', '=', 0]);

            // change the resolve state
            $join_request->isResolved = 1;
            $join_request->save();

            $cruds1 = new GroupUser([
                'user_id' => $userId,
                'group_id' => $groupId
            ]);
            $cruds1->save();
        }
        else {
            // find the record
            $join_request = JoinRequest::where(
                ['userId', '=', $userId],
                ['groupId', '=', $groupId],
                ['isResolved', '=', 0]);

            // change the resolve state
            $join_request->isResolved = 1;
            $join_request->save();
        }
    }
}
