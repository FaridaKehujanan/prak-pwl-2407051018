<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = (new UserModel())->getUser();

        return view('user-management', compact('users'));
    }
}
