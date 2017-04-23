<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/4/5
 * Time: 15:57
 */

namespace App\Repositories;
use App\Models\UserInformation;


class SelfInformationRepository
{
    public function updateSelfInformation($request, $id){
        $info = UserInformation::findOrFail($id);

        $info->autograph = $request->autograph;
        $info->description = $request->description;
        $info->sex = $request->sex;
        $info->birthday = $request->birthday;
        $info->IDnumber = $request->IDnumber;
        $info->qq = $request->qq;
        $info->phone = $request->phone;
        $info->nation = $request->nation;
        $info->college = $request->college;
        $info->major = $request->major;
        $info->class = $request->class;
        $info->category = $request->category;
        $info->enrollment = $request->enrollment;
        $info->direction = $request->direction;

        $info->save();
    }
}