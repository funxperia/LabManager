<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait,SoftDeletes { EntrustUserTrait::restore insteadof SoftDeletes; }//解决Entrust的restore方法和SoftDeletes的restore的冲突！
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sid', 'phone', 'status'
    ];
    /**
     * 设置软删除模型
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $admin = '526266606@qq.com';

    public function is_admin(){
        return $this->email == $this->admin ? true : false;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function selfInformation(){
        return $this -> hasOne('App\Models\UserInformation', 'uid');
    }
}
