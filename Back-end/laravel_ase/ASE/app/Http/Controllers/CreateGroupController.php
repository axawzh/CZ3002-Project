<?php


namespace App\Http\Controllers;

use App\AcademicGroup;
use App\GroupUser;
use App\Main_group;
use App\Index;
use App\NonAcademicGroup;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CreateGroupController extends BaseController
{

    function addGroup(Request $request)
    {
        $groupName = $request->input('groupName');
        $description = $request->input('description');
        $user = auth()->user();
        $admin = $user->id;
        $groupSize = $this->getGroupSize($request);
        $isFreeJoin = $request->input('isFreeJoin');
        $crud = new Main_group(['groupName' => $groupName, 'description' => $description, 'admin' => $admin, 'groupSize' => $groupSize, '$isFreeJoin' => $isFreeJoin]);
        $crud->save();
    }

    function getGroupId(Request $request)
    {
        $groupName = $request->input('groupName');
        $groupId = Main_group::where('groupName', $groupName)->first()->value('id');
        return $groupId;
    }

    function getIndexId(Request $request)
    {
        $indexNo = $request->input('indexNo');
        $indexId = Index::where('indexNo', $indexNo)->first()->value('indexId');
        return $indexId;
    }

    function getGroupSize(Request $request)
    {
        $indexNo = $request->input('indexNo');
        $groupSize = Index::where('indexNo', $indexNo)->first()->value('groupSize');
        return $groupSize;
    }

    function addAcademicGroup(Request $request)
    {
        $user = auth()->user();
        $admin = $user->id;
        $this->addGroup($request);
        $groupId = $this->getGroupId($request);
        $indexId = $this->getIndexId($request);
        $groupName =$request->input('groupName');
        $crud = new AcademicGroup(['groupId' => $groupId, 'indexId' => $indexId]);
        $crud->save();
        $crud1 = new GroupUser(['group_id' => $groupId, 'user_id' => $admin]);
        $crud1->save();
        $crud2 = new Group(['name' => $groupName]);
        $crud2->save();
    }

    function addNonAcademicGroup(Request $request)
    {
        $user = auth()->user();
        $admin = $user->id;
        $this->addGroup($request);
        $groupId = $this->getGroupId($request);
        $category = $request->input('category');
        $groupName =$request->input('groupName');
        $crud = new NonAcademicGroup(['groupId' => $groupId, 'category' => $category]);
        $crud->save();
        $crud1 = new GroupUser(['group_id' => $groupId, 'user_id' => $admin]);
        $crud1->save();
        $crud2 = new Group(['name' => $groupName]);
        $crud2->save();
    }

}
