<?php


namespace App\Http\Controllers;

use App\AcademicGroup;
use App\Group;
use App\GroupUser;
use App\Main_group;
use App\Index;
use App\Member;
use App\NonAcademicGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $isFreeJoin = $request->input('isFreeJoin') == 'free';
        $crud = new Main_group(['groupName' => $groupName, 'description' => $description, 'admin' => $admin, 'groupSize' => $groupSize, 'isFreeJoin' => $isFreeJoin]);
        $crud->save();
    }

    function getGroupId(Request $request)
    {
        $groupName = $request->input('groupName');
        $groupId = DB::table('main_groups')->where('groupName', $groupName)->value('id');
      //  $groupId = Main_group::where('groupName',$groupName)->first()->value('id');
        return $groupId;
    }

    function getIndexId(Request $request)
    {
        $indexNo = $request->input('indexNo');
        $indexId = DB::table('index')->where('indexNo', $indexNo)->value('id');
       // $indexId = Index::where('indexNo', $indexNo)->first()->value('id');
        return $indexId;
    }

    function getGroupSize(Request $request)
    {
        $indexNo = $request->input('indexNo');
        $groupSize = DB::table('index')->where('indexNo', $indexNo)->value('groupSize');
        //$groupSize = Index::where('indexNo', $indexNo)->first()->value('groupSize');
        return $groupSize;
    }

    function addAcademicGroup(Request $request)
    {
        $user = auth()->user();
        $admin = $user->id;
        $this->addGroup($request);
        $groupName = $request->input('groupName');
        $groupId = $this->getGroupId($request);
        $indexId = $this->getIndexId($request);
        $crud = new AcademicGroup(['groupId' => $groupId, 'indexId' => $indexId]);
        $crud->save();
        $crud1 = new GroupUser(['group_id' => $groupId, 'user_id' => $admin]);
        $crud1->save();
        $crud2 = new Group(['name' => $groupName]);
        $crud2->save();
        $crud3 = new Member(['userId' => $admin, 'groupId'=> $groupId]);
        $crud3->save();
        return redirect("/home");
    }

    function addNonAcademicGroup(Request $request)
    {
        $user = auth()->user();
        $admin = $user->id;
        $this->addGroup($request);
        $groupId = $this->getGroupId($request);
        $category = $request->input('category');
        $groupName = $request->input('groupName');
        $crud = new NonAcademicGroup(['groupId' => $groupId, 'category' => $category]);
        $crud->save();
        $crud1 = new GroupUser(['group_id' => $groupId, 'user_id' => $admin]);
        $crud1->save();
        $crud2 = new Group(['name' => $groupName]);
        $crud2->save();
        return redirect("/home");
    }

}
