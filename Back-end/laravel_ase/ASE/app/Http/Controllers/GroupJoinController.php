<?php

namespace App\Http\Controllers;

use App\JoinRequest;
use Illuminate\Http\Request;
use App\Group;

class GroupJoinController extends Controller
{
    public function join($groupId) {
        $isFreeJoin = Group::where('groupId', $groupId) -> first() -> pluck('isFreeJoin');
        $user = Auth()::user();

        // Free join
        if ($isFreeJoin == 1) {
            // Join directly
            $cruds = new Member([
                'userId' => $user->id,
                'groupId' => $groupId
            ]);
            $cruds->save();
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
