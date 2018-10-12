<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\User;
use App\Role;

class SuperuserController extends Controller
{
    public function index()
    {
        return view('users.superuser.index');
    }

    /**
     * Display a listing of users
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $users = User::with('roles')->latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the for for creating new users
     * @return newly created user
     */
    public function createUser()
    {
        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in DB
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(StoreUser $request)
    {
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
        ];

        $role = Role::where('name', $request->role)->firstOrFail();

        $user = User::create($data);

        if($user) $user->attachRole($role); 
        return redirect()->route('users.index');
    }

    /**
     * Display the specified user
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function showUser($email)
    {
        $user = User::whereEmail($email)->with([
                    'roles', 
                    'permissions'
                ])->firstOrFail();
        
        return view('users.show', ['user' => $user]);
    }
}
