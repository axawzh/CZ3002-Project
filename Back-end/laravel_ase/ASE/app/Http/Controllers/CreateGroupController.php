<?php


namespace App\Http\Controllers;

use App\Providers\Group;
use Illuminate\Routing\Controller as BaseController;

class CreateGroupController extends BaseController
{

    function addGroup(Request $request)
    {
        $groupName = $request->input('groupName');
        $description = $request->input('description');
        $admin = Auth::users()->id();
        $groupSize = $request->input('groupSize');
        DB::table('group')->insert(['groupName' => $groupName, 'description' => $description, 'admin' => $admin, 'groupSize' => $groupSize]);
        $this->addGroupUser($admin);
    }

    function getGroupId(Request $request)
    {
        $groupName = $request->input('groupName');
        $groupId = DB::table('group')->where ('groupName', $groupName)->value('id');
        return $groupId;
    }

    function getIndexId(Request $request)
    {
        $indexNo = $request->input('indexNo');
        $indexId = DB::table('index')->where('indexNo', $indexNo)->value('indexId');
        return $indexId;
    }

//    function addGroupUser($admin)
//    {
//        $groupId = $this->getGroupId();
//        DB::table('group_user')->insert(['userId' => $admin, 'groupId' => $groupId]);
//    }

    function addAcademicGroup()
    {
        $this->addGroup();
        $groupId = $this->getGroupId();
        $indexId = $this->getIndexId();
        DB::table('academic_group')->insert(['groupId' => $groupId, 'indexId' => $indexId]);
    }

    function addNonAcademicGroup(Request $request)
    {
        $this->addGroup();
        $groupId = $this->getGroupId();
        $category = $request->input('category');
        DB::table('non_academic_group')->insert(['groupId' => $groupId, 'category' => $category]);
    }


}
