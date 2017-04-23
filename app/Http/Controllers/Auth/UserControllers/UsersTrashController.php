<?php

namespace App\Http\Controllers\Auth\UserControllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersTrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::onlyTrashed()->with('roles.perms')->get();
        return view('auth.usersTrash.index', compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->restore();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
