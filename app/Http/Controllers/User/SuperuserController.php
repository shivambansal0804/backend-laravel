<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\User;
use App\Role;
use App\Permission;
use App\Events\UserHasRegistered;

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
        $password = rand();

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($password)
        ];

        $role = Role::where('name', $request->role)->firstOrFail();

        $user = User::create($data);

        if($user) $user->attachRole($role); 

        event( new UserHasRegistered($user, $password));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified user
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function showUser($uuid)
    {
        $user = User::whereUuid($uuid)->with([
                    'roles', 
                    'permissions'
                ])->firstOrFail();
        
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function editPermissionUser($uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();
        
        $userPermissions = $user->allPermissions();

        $allPermissions = Permission::all();

        return view('users.permission', [
            'user' => $user,
            'userPermissions' => $userPermissions,
            'allPermissions' => $allPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePermissionUser(Request $request, $uuid)
    {
        // $permissions = [];

        // foreach ($request->pemissions as $key) {
        //     array_push($permissions, $key);
        // }

        $user = User::whereUuid($uuid)->firstOrFail();

        // if($user && $permissions) {
        //     foreach ($permissions as $item) {
        //         $permission = Permission::where('name', $item)->first();

        //         $user->attachPermission($permission->id);
        //     }
        // }

        $permission = Permission::where('name', $request->permissions)->first();

        $user->attachPermission($permission->id);

        return redirect()->route('users.show', $user->uuid);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function editRoleUser($uuid)
    {
        $user = User::whereUuid($uuid)->with('roles')->firstOrFail();
        
        $allRole = Role::all();

        return view('users.role', [
            'user' => $user,
            'allRole' => $allRole
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoleUser(Request $request, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $role = Role::where('name', $request->role)->firstOrFail();

        $user->syncRoles([$role->id]);

        return redirect()->route('users.show', $user->uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();
        $user->delete();
        return redirect()->route('users.index');
    }
}
