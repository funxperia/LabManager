<?php
/*
 * 全局函数文件
 * 用于定义系统所需的全局函数
 *
 */
function protect_default_admin($role, $user){
    if($role->is_admin() && $user->is_admin()){
        return 'disabled';
    }
}