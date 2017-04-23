<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = 'users_information';

    protected $fillable = [
        'head', 'sex', 'phone', 'IDnumber', 'birthday', 'nation', 'college', 'major', 'class', 'category', 'enrollment'
    ];

    public function user(){
        return $this -> belongsTo('App\User');
    }
}
