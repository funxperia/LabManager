<?php

namespace App\Http\Controllers\Auth\UserControllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    public function __construct(){
        $this->middleware('role:Administrator');
    }
    public function edit($id){

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required'
        ],[
            'display_name.required' => '显示名称不可为空',
            'description.required' => '描述不可为空'
        ]);


        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        return redirect()->back();
    }
}
