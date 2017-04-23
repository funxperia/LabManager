<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/4/19
 * Time: 17:32
 *
 */

namespace App\Repositories;

use App\User;
use App\Models\Role;

use Illuminate\Foundation\Validation\ValidatesRequests;

class UserRepository
{
    use ValidatesRequests;

    function __construct()
    {
    }

    /**
     * 创建用户
     * @param $request
     * @return string
     */
    public function createUser($request){
        $tag1 = 0;
        $tag2 = 0;
        $this->validate($request, [
            "name" => array('required','regex:/^[\x80-\xff_a-zA-Z0-9]{2,15}$/'),
            "sid" => "required|integer|unique:users,sid",
            "email" => "required|email|unique:users,email",
            "password" => "required|alpha_num|confirmed"
        ], [
            "name.required" => "姓名不可为空！",
            "name.regex" => "姓名为汉字并在2-15个字符内！",
            "sid.required" => "学号不可为空",
            "sid.integer" => "学号为整型",
            "sid.unique" => "学号不可与他人的一致",
            "email.required" => "邮箱不可为空",
            "email.email" => "邮箱必为邮箱格式",
            "email.unique" => "邮箱不可与他人一致",
            "status.required" => "状态不为空",
            "password.required" => "密码不可为空",
            "password.alpha_num" => "密码为字母和数字",
            "password.confirmed" => "前后密码不一致",
        ]);

        $user = User::create([
            'name' => $request->name,
            'sid' => $request->sid,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if($user->save())
            $tag1 = 1;

        $roles = $request->role;
        if($roles){
            $roles = $this->role($roles);
            if($user->attachRoles($roles))
                $tag2 = 1;
        }

        if($tag1==1 || $tag2==1)
            return $message = "创建成功";
        else
            return $message = "创建失败!";

    }

    /**
     * 修改用户信息简单工厂
     * @param $request
     * @param $id
     * @return string
     */
    public function updateUser($request,$id){
        $type= $request->type;
        $message = null;
        if($type){
            switch($type){
                case "edit_user": $message = $this->editInformation($request, $id); break;
                case "edit_role": $message = $this->editRole($request, $id); break;
                case "edit_password": $message = $this->editPassword($request, $id); break;
            }
            return $message;
        }else{
            return "系统错误！！！无法检测操作类型！！！";
        }
    }
    /**
     * 处理角色数据
     * @param $roles
     * @return array
     */
    protected function role($roles){
        $roles1 = array();
        $i = 0;
        foreach ($roles as $role) {
            $role = substr($role, 0, 1);
            $roles1[$i] = $role;
            $i++;
        }
        return $roles1;
    }

    /**
     * 修改基本信息生产线
     * @param $request
     * @param $id
     * @return string
     */
    protected function editInformation($request, $id){
        $user = User::findOrFail($id);

        $this->validate($request, [
            "name" => array('required','regex:/^[\x80-\xff_a-zA-Z0-9]{2,15}$/'),
            "sid" => "required|integer|size:11",
            "sid" => "unique:users,sid,".$user->id,
            "email" => "required|email",
            "email" => "unique:users,email,".$user->id,
            "status" => "required",
        ], [
            "name.required" => "姓名不可为空！",
            "name.regex" => "姓名为汉字并在2-15个字符内！",
            "sid.required" => "学号不可为空",
            "sid.integer" => "学号为整型",
            "sid.size" => "学号为11位",
            "sid.unique" => "学号不可与他人的一致",
            "email.required" => "邮箱不可为空",
            "email.email" => "邮箱必为邮箱格式",
            "email.unique" => "邮箱不可与他人一致",
            "status.required" => "状态不为空",
        ]);

        $user->name = $request->name;
        $user->sid = $request->sid;
        $user->email = $request->email;
        $user->status = $request->status;

        if($user->save()){
            $message = "修改成功";
            return $message;
        }else{
            return $message = "修改失败";
        }
    }

    /**
     * 修改身份生产线
     * @param $request
     * @param $id
     * @return string
     */
    protected function editRole($request, $id){
        $user = User::findOrFail($id);

        $roles1= $request->role;

        if($roles1) {
            $roles = $this->role($roles1);
        }else{
            $roles = $roles1;
        }

        $tag1 = 0;
        $tag2 = 0;

        if($roles){
            if($user->roles()->sync($roles))
                $tag1 = 1;
        }else{
            if($user->roles()->detach())
                $tag1 = 1;
        }

        if($user->is_admin()){
            $admin = Role::where('name','Administrator')->first();
            $user->attachRole($admin);
            $tag2 = 1;
        }

        if($tag1==1 || $tag2==1){
            return $message = "修改成功";
        }else{
            return $message = "修改失败";
        }
    }

    /**
     * 修改密码生产线
     * @param $request
     * @param $id
     * @return string
     */
    protected function editPassword($request, $id){
        $user = User::findOrFail($id);

        $this->validate($request, [
            "password" => "required|alpha_num|confirmed"
        ], [
            "password.required" => "密码不可为空",
            "password.alpha_num" => "密码为字母和数字",
            "password.confirmed" => "前后密码不一致",
        ]);

        $user->password = bcrypt($request->password);

        if($user->save()){
            return $message = "修改成功";
        }else{
            return $message = "修改失败";
        }
    }

}