<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperuserController extends Controller
{
    public function index()
    {
        return view('users.superuser.index');
    }
}
