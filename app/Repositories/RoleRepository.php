<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/4/16
 * Time: 10:17
 */

namespace App\Repositories;

use App\Models\Role;

use Illuminate\Foundation\Validation\ValidatesRequests;
class RoleRepository
{
    use ValidatesRequests;

    public function perm($perms){
        $perms1 = array();
        $i = 0;
        foreach($perms as $perm){
            $perm = substr($perm, 0, 1);
            $perms1[$i] = $perm;
            $i++;
        }
        return $perms1;
    }

    public function createRole($request){
        $this->validate($request, [
            'name' => 'required|alpha_dash|unique:roles',
            'display_name' => 'required',
            'description' => 'required|unique:roles'
        ], [
            'name.required' => '角色名称必须为空',
            'name.alpha_dash' => '角色名必须由字母和数字，以及破折号和下划线组成',
            'name.unique' => '角色名不可以重复',
            'display_name.required' => '显示名称不可为空',
            'description.required' => '描述不可为空',
            'description.unique' => '描述不可重复',
        ]);
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        $perms = $request->perm1;
        $perm = $this->perm($perms);

        if($request->perm1){
            $role->attachPermissions($perm);
        }
    }

    public function updateRole($request, $id){
        $role = Role::findOrFail($id);

        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'description' => 'unique:roles,'.$role->id
        ],[
            'display_name.required' => '显示名称不可为空',
            'description.required' => '描述不可为空',
            'description.unique' => '描述不可以与其他角色重复'
        ]);

        $role->display_name = $request->display_name;
        $role->description = $request->description;

        $role->save();

        $perms = $request->perm;
        $perm = $this->perm($perms);

        $role->savePermissions($perm);
    }
}