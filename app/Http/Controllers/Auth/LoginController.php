<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * 锁定用户名键名为login
     *
     * @return string
     *
     */
    public function username(){
        return 'login';
    }
    /**
     * 重写字段名取得方法，动态判断类型
     *
     * @var Request
     * @return array
     */
    public function credentials(Request $request){
        $login = $request -> get('login');
        $middle = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $field = filter_var($login, FILTER_VALIDATE_INT) ? 'sid' : $middle;
        return [
            $field => $login,
            'password' => $request->get('password')
        ];
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
