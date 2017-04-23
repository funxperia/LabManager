<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\User;

class PowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //设置外键检查为不检查：
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        //清空相关数据表：
        Permission::truncate();
        Role::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();
        //恢复外键检查：
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        //查找初始用户：
        $id = 1;
        $firstUser = User::findOrFail($id);
        //创建初始角色：
        $admin = Role::create([
            'name' => 'Administrator',
            'display_name' => '超级管理员',
            'description' => '超级管理员，拥有一切权限，类似于德意志第二帝国皇帝。'
        ]);
        $projectLeader = Role::create([
            'name' => 'PL',
            'display_name' => '项目负责人',
            'description' => '负责各个项目，拥有对自己的项目进行管理的权限，类似于德意志第二帝国各邦君主。',
        ]);
        $laboratoryDirector = Role::create([
            'name' => 'LD',
            'display_name' => '实验室室长',
            'description' => '实验室室长，默认拥有一切权限，但却受制于超级管理员，类似于德意志第二帝国宰相。',
        ]);
        $laboratoryDirectorAssistant = Role::create([
            'name' => 'LDA',
            'display_name' => '实验室副室长',
            'description' => '实验室副室长，默认拥有除活动、人权以外的所有权限，直接对项目负责人负责，受制于超级管理员和实验室室长，类似于德意志第二帝国联邦议会。'
        ]);
        $webFontEndDeveloperDepartmentHead = Role::create([
            'name' => 'WFEDDH',
            'display_name' => 'web前端工程师方向负责人',
            'description' => '各个学习方向的负责人，仅拥有对应博客和问答的管理权限，类似于德意志第二帝国帝国议会。',
        ]);
        $webBackEndDeveloperDepartmentHead = Role::create([
            'name' => 'WBEDDH',
            'display_name' => 'web后端工程师方向负责人',
            'description' => '各个学习方向的负责人，仅拥有对应博客和问答的管理权限，类似于德意志第二帝国帝国议会。',
        ]);
        $databaseDepartmentHead = Role::create([
            'name' => 'DBDH',
            'display_name' => '数据库方向负责人',
            'description' => '各个学习方向的负责人，仅拥有对应博客和问答的管理权限，类似于德意志第二帝国帝国议会。',
        ]);
        $webFullStackDeveloperDepartmentHead = Role::create([
            'name' => 'WFSDDH',
            'display_name' => 'web全栈方向负责人',
            'description' => '各个学习方向的负责人，仅拥有对应博客和问答的管理权限，类似于德意志第二帝国帝国议会。',
        ]);
        $normalUser = Role::create([
            'name' => 'NU',
            'display_name' => '普通成员',
            'description' => '实验室普通成员，类似于德意志第二帝国普通民众。'
        ]);

        //创建权限：
        $blogManage = Permission::create([
            'name' => 'Blog_Manage',
            'display_name' => '博客管理',
            'description' => '用于删除文章，设置精品，管理标签'
        ]);
        $questionManage = Permission::create([
            'name' => 'Question_Manage',
            'display_name' => '问答管理',
            'description' => '用于删除问题，设置精品，管理标签'
        ]);
        $projectManage = Permission::create([
            'name' => 'Project_Manage_All',
            'display_name' => '项目管理（副室长）',
            'description' => '具有全部项目管理权限'
        ]);
        $projectManagePl = Permission::create([
            'name' => 'Project_Manage_pl',
            'display_name' => '项目管理（项目负责人）',
            'description' => '具有对自己负责的项目的管理权限'
        ]);
        $labManage = Permission::create([
            'name' => 'Lab_Manage',
            'display_name' => '综合管理',
            'description' => '实验室综合管理权限'
        ]);
        $signInManage = Permission::create([
            'name' => 'Sign_In_Manage',
            'display_name' => '签到管理',
            'description' => '签到管理'
        ]);
        $sanitationManage = Permission::create([
            'name' => 'Sanitation_Manage',
            'display_name' => '卫生管理',
            'description' => '卫生管理'
        ]);
        $waterManage = Permission::create([
            'name' => 'Water_Manage',
            'display_name' => '搬水管理',
            'description' => '搬水管理'
        ]);
        $consumableManage = Permission::create([
            'name' => 'Consumable_Manage',
            'display_name' => '耗材管理',
            'description' => '耗材管理'
        ]);
        $activityManage = Permission::create([
            'name' => 'Activity_Manage',
            'display_name' => '活动管理',
            'description' => '活动管理'
        ]);
        $interviewManage = Permission::create([
            'name' => 'Interview_Manage',
            'display_name' => '面试管理',
            'description' => '面试管理'
        ]);
        $humanRightsManage = Permission::create([
            'name' => 'Human_Rights_Manage',
            'display_name' => '人权管理',
            'description' => '人权管理：人员管理，权限管理'
        ]);
        $informManage = Permission::create([
            'name' => 'Inform_Manage',
            'display_name' => '通知管理',
            'description' => '通知管理'
        ]);
        $privateLetter = Permission::create([
            'name' => 'Private_Letter',
            'display_name' => '私信权限',
            'description' => '能否发私信'
        ]);
        $discuss = Permission::create([
            'name' => 'Discuss',
            'display_name' => '评论，回答权限',
            'description' => '能否评论文章，回答问题'
        ]);
        $summon = Permission::create([
            'name' => 'Summon',
            'display_name' => '@权限',
            'description' => '能否@别人'
        ]);
        //给角色赋予相关权限：
        $admin->attachPermissions(array(
            $blogManage, $questionManage, $projectManage, $projectManagePl, $labManage, $sanitationManage,
            $signInManage, $summon, $waterManage, $consumableManage, $activityManage, $informManage,
            $interviewManage, $humanRightsManage, $privateLetter, $discuss
        ));
        $projectLeader->attachPermission($projectManagePl);
        $laboratoryDirector->attachPermissions(array(
            $blogManage, $questionManage, $projectManage, $projectManagePl , $labManage, $sanitationManage,
            $signInManage, $summon, $waterManage, $consumableManage, $activityManage, $informManage,
            $interviewManage, $humanRightsManage, $privateLetter, $discuss
        ));
        $laboratoryDirectorAssistant->attachPermissions(array(
            $blogManage, $questionManage, $projectManage, $projectManagePl, $labManage, $sanitationManage,
            $signInManage, $summon, $waterManage, $consumableManage, $informManage, $interviewManage,
            $privateLetter, $discuss
        ));
        $webBackEndDeveloperDepartmentHead->attachPermissions(array($blogManage, $questionManage));
        $webFontEndDeveloperDepartmentHead->attachPermissions(array($blogManage,$questionManage));
        $webFullStackDeveloperDepartmentHead->attachPermissions(array($blogManage, $questionManage));
        $databaseDepartmentHead->attachPermissions(array($blogManage, $questionManage));
        //给用户赋予相关角色：
        $firstUser->attachRole($admin);
    }
}
