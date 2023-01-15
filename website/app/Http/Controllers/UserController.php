<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::All();
        return view('users.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = "admin";

        return redirect()->back()->with('success', `User $user->name is now admin`);
    }

    public function removeUser($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('deleted', `User $user->name has been removed`);
    }
}
